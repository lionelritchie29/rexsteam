<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WarningAlert extends Component
{
    public $header;
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($header, $message)
    {
        $this->header = $header;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.warning-alert');
    }
}
