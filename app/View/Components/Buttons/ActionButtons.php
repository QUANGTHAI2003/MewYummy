<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class ActionButtons extends Component
{
    public $routeEdit;
    public $routeDelete;
    public $idRoute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($routeEdit, $routeDelete, $idRoute)
    {
        $this->routeEdit = $routeEdit;
        $this->routeDelete = $routeDelete;
        $this->idRoute = $idRoute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.action-buttons');
    }
}
