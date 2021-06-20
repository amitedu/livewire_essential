<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class PollExample extends Component
{
    public $revenue;

    public function mount()
    {
        $this->revenue = $this->getRevenue();
    }


    public function getRevenue()
    {
        $this->revenue = Order::sum('price');

        return $this->revenue;
    }


    public function render()
    {
        return view('livewire.poll-example');
    }
}
