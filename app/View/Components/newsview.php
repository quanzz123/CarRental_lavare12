<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\TblNews;
class newsview extends Component
{
    public $newsview;
    
    public function __construct()
    {
        //
        $this->newsview = TblNews::where('IsActive',1)->limit(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.newsview');
    }
}
