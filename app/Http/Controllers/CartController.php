<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblCar;

class CartController extends Controller
{
    // 
    // app/Http/Controllers/CartController.php

public function addToCartAjax(Request $request)
{
    $id = $request->product_id;
    $product = TblCar::findOrFail($id);

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "name" => $product->CarName,
            "quantity" => 1,
            "price" => $product->Price,
            "image" => $product->Image
        ];
    }

    session()->put('cart', $cart);

    return response()->json([
        'status' => 'success',
         'message' => 'Đã thêm sản phẩm vào giỏ hàng!',
        'cart_count' => count($cart)
    ]);
}

public function ViewCart() {
    $carts = session()->get('cart',[]);
    
    return view('pages.view-cart', compact('carts'));
}

}



