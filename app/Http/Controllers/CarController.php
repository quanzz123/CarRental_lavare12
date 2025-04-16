<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;
class CarController extends Controller
{
    //
    public function index() {

        $cars = Cars::where('IsActive', 1)->get(); // Lọc xe đang hoạt động nếu cần
        return view('pages.shop', compact('cars'));
    }

    public function Details($alias) {
        $car = Cars::where('Alias', $alias)->firstOrFail();
         // Lấy các sản phẩm đang giảm giá, loại trừ sản phẩm hiện tại
        $featuredProducts = Cars::where('IsSale', true)
                                ->where('CarID', '!=', $car->CarID)
                                ->take(4)
                                ->get();
    return view('pages.CarDetails', compact('car','featuredProducts'));
    }
    
}
