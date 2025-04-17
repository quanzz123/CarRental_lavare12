<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\TblCartype;
class CarTypesList extends Component
{
    /**
     * Create a new component instance.
     */
    public $carTypes;
    public function __construct()
    {
        //
        $this->carTypes = TblCartype::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.car-types-list');
    }
}
