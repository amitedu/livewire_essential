<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    public $active = true;
    public $search;
    public $sortFeild;
    public $sortAsc = true;
    protected $queryString = ['search', 'active', 'sortFeild', 'sortAsc'];

    public function sortBy($feild)
    {
        if ($this->sortFeild === $feild) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortFeild = $feild;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }


    /** @noinspection PhpUndefinedMethodInspection */
    public function render()
    {
        return view('livewire.data-table', [
            'contacts' => Contact::where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
                ->when($this->sortFeild,
                    fn($query) => $query->orderBy($this->sortFeild, $this->sortAsc ? 'asc' : 'desc')
                )
                ->where('active', $this->active)
                ->paginate(10)
        ]);
    }
}
