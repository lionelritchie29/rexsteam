<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CartCard extends Component
{
    public $game;
    public $showDeleteBtn;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($game, $showDeleteBtn)
    {
        $this->game = $game;
        $this->showDeleteBtn = $showDeleteBtn;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cart-card');
    }
}
