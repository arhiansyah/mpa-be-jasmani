<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminListMenuSidebarDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public $link;
    public $title;
    public $activate;

    public function __construct($link, $title, $activate)
    {
        $this->link = $link;
        $this->title = $title;
        $this->activate = $activate;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        return view('components.admin-list-menu-sidebar-dropdown');
    }
}
