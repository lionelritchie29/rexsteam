<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteConfirmationModal extends Component
{
    public $itemId;
    public $itemName;
    public $deleteActionRouteName;
    public $cancelActionRouteName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($itemId, $itemName, $deleteActionRouteName, $cancelActionRouteName)
    {
        $this->itemId = $itemId;
        $this->itemName = $itemName;
        $this->deleteActionRouteName = $deleteActionRouteName;
        $this->cancelActionRouteName = $cancelActionRouteName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.delete-confirmation-modal');
    }
}
