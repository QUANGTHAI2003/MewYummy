<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageTitle extends Component
{
    public $currentPage;
    public $pageTitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($currentPage, $pageTitle)
    {
        $this->currentPage = $currentPage;
        $this->pageTitle = $pageTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-title');
    }
}
