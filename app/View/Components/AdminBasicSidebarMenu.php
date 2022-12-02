<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminBasicSidebarMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $link;
    public $activate;

    public function __construct($link, $activate)
    {
        $this->link = $link;
        $this->activate = $activate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-basic-sidebar-menu');
    }
}
