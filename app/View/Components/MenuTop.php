<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\TblMenu;
class MenuTop extends Component
{
    /**
     * Create a new component instance.
     */
    public $menu;
    public function __construct()
    {
        //
        $this->menu = TblMenu::orderBy('Position', 'asc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu-top');
    }
}
