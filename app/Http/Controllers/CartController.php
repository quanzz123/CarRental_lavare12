<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblCar;
use Carbon\Carbon;

class CartController extends Controller
{

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
            "image" => $product->Image,
            "pickup_date" => date('Y-m-d'),
            "return_date" => date('Y-m-d', strtotime('+1 day'))
        ];
    }

    session()->put('cart', $cart);

    return response()->json([
        'status' => 'success',
        'message' => 'Đã thêm sản phẩm vào giỏ hàng!',
        'cart_count' => count($cart)
    ]);
}

public function updateCart(Request $request)
{
    $cart = session()->get('cart', []);
    $carId = $request->car_id;
    $field = $request->field;
    $value = $request->value;

    if (isset($cart[$carId])) {
        $cart[$carId][$field] = $value;
        
        // If updating dates, recalculate the quantity (days)
        if ($field === 'pickup_date' || $field === 'return_date') {
            $pickup = Carbon::parse($cart[$carId]['pickup_date']);
            $return = Carbon::parse($cart[$carId]['return_date']);
            $cart[$carId]['quantity'] = max(1, $pickup->diffInDays($return));
        }

        session()->put('cart', $cart);
        return response()->json([
            'success' => true,
            'cart' => $cart,
            'message' => 'Cart updated successfully'
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Failed to update cart'
    ], 400);
}

public function ViewCart() {
    $carts = session()->get('cart',[]);
    
    return view('pages.view-cart', compact('carts'));
}
}
