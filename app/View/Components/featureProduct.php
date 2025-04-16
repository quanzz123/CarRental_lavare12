<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Cars;
class featureProduct extends Component
{
    /**
     * Create a new component instance.
     */
    public $cars;
    public function __construct()
    {
        //
        // Lấy danh sách sản phẩm nổi bật từ CSDL
        $this->cars = Cars::where('IsSale', true)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.feature-product');
    }
}
