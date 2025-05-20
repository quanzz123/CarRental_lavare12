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
                                <th class="pro-title">Car</th>
                                <th class="pro-price">Price/Day</th>
                                <th class="pro-quantity">Days</th>
                                <th class="pro-dates">Rental Period</th>
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
                                            <input class="cart-plus-minus-box rental-days" 
                                                   value="{{$item['quantity']}}" 
                                                   type="number" 
                                                   min="1" 
                                                   data-car-id="{{$loop->index}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="pro-dates">
                                    <div class="rental-dates">
                                        <input type="date" 
                                               class="form-control pickup-date" 
                                               value="{{$item['pickup_date'] ?? date('Y-m-d')}}" 
                                               min="{{date('Y-m-d')}}"
                                               data-car-id="{{$loop->index}}">
                                        <input type="date" 
                                               class="form-control return-date mt-2" 
                                               value="{{$item['return_date'] ?? date('Y-m-d', strtotime('+1 day'))}}" 
                                               min="{{date('Y-m-d', strtotime('+1 day'))}}"
                                               data-car-id="{{$loop->index}}">
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
                                    <td>{{number_format($total, 0, ',', '.')}} VND</td>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount">{{number_format($total, 0, ',', '.')}} VND</td>
                                </tr>
                            </table>
                        </div>
                        <form action="{{ url('/vnpay-payment') }}" method="POST" class="mt-3">
                            @csrf
                            <button type="submit" class="btn flosun-button primary-btn rounded-0 black-btn w-100">
                                <i class="fa fa-credit-card mr-2"></i> Pay with VNPay
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart main wrapper end -->  
  @endsection
