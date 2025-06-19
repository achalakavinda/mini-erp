<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class SelectCompany extends Component
{
    public $companies;
    public $selected;

    /**
     * Create a new component instance.
     *
     * @return void
     */
     public function __construct($companies = [], $selected = null)
    {
        $this->companies = $companies;
        $this->selected = $selected;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select-company');
    }
}
