<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GameDetailBreadcrumb extends Component
{
    public $category;
    public $gameTitle;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($category, $gameTitle)
    {
        $this->category = $category;
        $this->gameTitle = $gameTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.game-detail-breadcrumb');
    }
}
