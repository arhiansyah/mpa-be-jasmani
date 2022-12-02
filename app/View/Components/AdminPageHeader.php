<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminPageHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $subtitle;
    // public $module;
    // public $method;
    public function __construct($title, $subtitle)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        // $this->module = $module;
        // $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-page-header');
    }
}
