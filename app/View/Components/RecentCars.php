<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Cars; 
class RecentCars extends Component
{
    /**
     * Create a new component instance.
     */
    public $recentcars;
    public function __construct()
    {
        //
        $this->recentcars = Cars::where('IsActive',1)->limit(3)->get();
       
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.recent-cars');
    }
}
