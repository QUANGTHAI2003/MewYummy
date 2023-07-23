<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class FeatureButton extends Component
{

    public $back;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($back)
    {
        $this->back = $back;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.feature-button');
    }
}
