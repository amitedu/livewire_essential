<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SortIcon extends Component
{
    private $feild;
    private $sortAsc;
    private $sortFeild;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($feild, $sortFeild, $sortAsc)
    {

        $this->feild = $feild;
        $this->sortFeild = $sortFeild;
        $this->sortAsc = $sortAsc;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sort-icon');
    }
}
