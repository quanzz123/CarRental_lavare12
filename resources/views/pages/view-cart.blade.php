  @extends('page_layout')
  @section('content')
      <!-- Breadcrumb Area Start Here -->
  <div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Shopping Cart</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- cart main wrapper start -->
<div class="cart-main-wrapper mt-no-text">
    <div class="container custom-area">
        <div class="row">
            <div class="col-lg-12 col-custom">
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach ($carts as $item )
                            @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                            <tr>
                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="{{asset('public/fontend/assets/images/product/'. $item['image'])}}" alt="Product" /></a></td>
                                <td class="pro-title"><a href="#">{{$item['name']}} <br> màu đen</a></td>
                                <td class="pro-price"><span>{{number_format($item['price'], 0, ',', '.')}}</span></td>
                                <td class="pro-quantity">
                                    <div class="quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="{{$item['quantity']}}" type="text">
                                            <div class="dec qtybutton">-</div>
                                            <div class="inc qtybutton">+</div>
                                            <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="pro-subtotal"><span>{{number_format($subtotal, 0, ',', '.') }}</span></td>
                                <td class="pro-remove"><a href="#"><i class="lnr lnr-trash"></i></a></td>
                            </tr>
                            @endforeach
                            
                           
                        </tbody>
                    </table>
                </div>
                <!-- Cart Update Option -->
                <div class="cart-update-option d-block d-md-flex justify-content-between">
                    <div class="apply-coupon-wrapper">
                        <form action="#" method="post" class=" d-block d-md-flex">
                            <input type="text" placeholder="Enter Your Coupon Code" required />
                            <button class="btn flosun-button primary-btn rounded-0 black-btn">Apply Coupon</button>
                        </form>
                    </div>
                    <div class="cart-update mt-sm-16">
                        <a href="#" class="btn flosun-button primary-btn rounded-0 black-btn">Update Cart</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 ml-auto col-custom">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Cart Totals</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Sub Total</td>
                                    <td>$230</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>$70</td>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount">$300</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="checkout.html" class="btn flosun-button primary-btn rounded-0 black-btn w-100">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart main wrapper end -->  
  @endsection
