<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblCar;
use App\Models\TblCartype;
class CarController extends Controller
{
    //
    public function index() {

        $cars = TblCar::where('IsActive', 1)->get(); // Lọc xe đang hoạt động nếu cần
        $categories = TblCartype::all();
        return view('pages.shop', compact('cars','categories'));
    }
    public function Categories() {
        $categories = TblCartype::all()->get();
    }

    public function Details($alias) {
        $car = TblCar::where('Alias', $alias)->firstOrFail();
         // Lấy các sản phẩm đang giảm giá, loại trừ sản phẩm hiện tại
        $featuredProducts = TblCar::where('IsSale', true)
                                ->where('CarID', '!=', $car->CarID)
                                ->take(4)
                                ->get();
    return view('pages.CarDetails', compact('car','featuredProducts'));
    }
    
}
