@extends('page_layout')
@section('content')
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Product Details</h3>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Product Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Single Product Main Area Start -->
    <div class="single-product-main-area">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 col-custom">
                    <div class="product-details-img">
                        <div class="single-product-img swiper-container gallery-top popup-gallery">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a class="w-100" href="{{ asset('/fontend/assets/images/product/' . $car->Image) }}">
                                        <img class="w-100" src="{{ asset('/fontend/assets/images/product/' . $car->Image) }}" alt="Product">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a class="w-100" href="{{ asset('fontend/assets/images/product/' . $car->Image) }}">
                                        <img class="w-100" src="{{ asset('fontend/assets/images/product/' . $car->Image) }}" alt="Product">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a class="w-100" href="{{ asset('fontend/assets/images/product/' . $car->Image) }}">
                                        <img class="w-100" src="{{ asset('fontend/assets/images/product/' . $car->Image) }}" alt="Product">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a class="w-100" href="{{ asset('fontend/assets/images/product/' . $car->Image) }}">
                                        <img class="w-100" src="{{ asset('fontend/assets/images/product/' . $car->Image) }}" alt="Product">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a class="w-100" href="{{ asset('fontend/assets/images/product/' . $car->Image) }}">
                                        <img class="w-100" src="{{ asset('fontend/assets/images/product/' . $car->Image) }}" alt="Product">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a class="w-100" href="{{ asset('fontend/assets/images/product/' . $car->Image) }}">
                                        <img class="w-100" src="{{ asset('fontend/assets/images/product/' . $car->Image) }}" alt="Product">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="single-product-thumb swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('fontend/assets/images/product/' . $car->Image) }}" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('fontend/assets/images/product/' . $car->Image) }}" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('fontend/assets/images/product/' . $car->Image) }}" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('fontend/assets/images/product/' . $car->Image) }}" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/product/small-size/5.jpg" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/product/small-size/6.jpg" alt="Product">
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white"><i class="lnr lnr-arrow-right"></i></div>
                            <div class="swiper-button-prev swiper-button-white"><i class="lnr lnr-arrow-left"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-custom">
                    <div class="product-summery position-relative">
                        <div class="product-head mb-3">
                            <h2 class="product-title">{{$car->CarName}}</h2>
                        </div>
                        <div class="price-box mb-2">
                        <span class="regular-price">${{ $car->SalePrice ?? $car->Price }}</span>
                        @if ($car->SalePrice)
                            <span class="old-price"><del>${{ $car->Price }}</del></span>
                        @endif
                        </div>
                        <div class="product-rating mb-3">
                            @for ($i = 1; $i <= 5; $i++)
                            <i class="fa fa-star{{ $car->Rate >= $i ? '' : '-o' }}"></i>
                            @endfor
                        </div>
                        <div class="sku mb-3">
                            <span>SKU: 12345</span>
                        </div>
                        <p class="desc-content mb-5">{{$car->Descriptions}}</p>
                        <div class="quantity-with_btn mb-5">
                            <div class="container">
                              <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="rental-details p-4 border rounded">
                                        <h4 class="mb-4">Chi tiết thuê xe</h4>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="pickup_date">Ngày nhận xe</label>
                                                    <input type="date" class="form-control" id="pickup_date" 
                                                           min="{{date('Y-m-d')}}" 
                                                           value="{{date('Y-m-d')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="return_date">Ngày trả xe</label>
                                                    <input type="date" class="form-control" id="return_date" 
                                                           min="{{date('Y-m-d', strtotime('+1 day'))}}" 
                                                           value="{{date('Y-m-d', strtotime('+1 day'))}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rental-summary mt-3">
                                            <div class="d-flex justify-content-between mb-2">
                                                <span>Đơn giá:</span>
                                                <span>{{number_format($car->Price, 0, ',', '.')}} VND</span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span>Số ngày thuê:</span>
                                                <span id="rental_days">1</span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2 pt-2 border-top">
                                                <strong>Tổng tiền:</strong>
                                                <strong id="total_amount">{{number_format($car->Price, 0, ',', '.')}} VND</strong>
                                            </div>
                                        </div>
                                    </div>
                                      <!-- Include SweetAlert2 CSS and JS -->
                                      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
                                      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                      
                                      <script>
                                        function validateDates() {
                                            const startDate = new Date(document.getElementById('start-datetime').value);
                                            const endDate = new Date(document.getElementById('end-datetime').value);
                                            
                                            if (startDate && endDate && startDate >= endDate) {
                                                Swal.fire({
                                                    icon: "error",
                                                    title: "Oops...",
                                                    text: "Ngày trả phải sau ngày thuê!",
                                                    footer: '<a href="#">Why do I have this issue?</a>'
                                                });
                                                document.getElementById('end-datetime').value = '';
                                            }
                                        }
                                        
                                        // Set minimum start date to today
                                        const today = new Date();
                                        const todayStr = today.toISOString().slice(0, 16);
                                        document.getElementById('start-datetime').min = todayStr;
                                        document.getElementById('end-datetime').min = todayStr;
                                      </script>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                    // Set default value for start datetime (current date/time)
                                    const now = new Date();
                                    const startDateTime = now.toISOString().slice(0, 16);
                                    $('#start-datetime').val(startDateTime);
                                    
                                    // Set default value for end datetime (current date/time + 1 hour)
                                    const oneHourLater = new Date(now.getTime() + (60 * 60 * 1000));
                                    const endDateTime = oneHourLater.toISOString().slice(0, 16);
                                    $('#end-datetime').val(endDateTime);
                                    
                                    // Make the calendar icons clickable
                                    $('.datetime-icon').click(function() {
                                        $(this).prev('input').focus();
                                    });
                                    
                                    // Validate that end datetime is after start datetime
                                    $('#end-datetime').on('change', function() {
                                        const startVal = new Date($('#start-datetime').val());
                                        const endVal = new Date($(this).val());
                                        
                                        if (endVal < startVal) {
                                        alert('End date and time must be after start date and time');
                                        $(this).val(endDateTime);
                                        }
                                    });
                                    
                                    $('#start-datetime').on('change', function() {
                                        const startVal = new Date($(this).val());
                                        const endVal = new Date($('#end-datetime').val());
                                        
                                        if (endVal < startVal) {
                                        // Update end datetime to be start datetime + 1 hour
                                        const oneHourAfterStart = new Date(startVal.getTime() + (60 * 60 * 1000));
                                        const newEndDateTime = oneHourAfterStart.toISOString().slice(0, 16);
                                        $('#end-datetime').val(newEndDateTime);
                                        }
                                    });
                                    });
                                </script>
                             
                        </div>
                        <div class="quantity-with_btn mb-5">
                            <div class="quantity">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="0" type="text">
                                    <div class="dec qtybutton">-</div>
                                    <div class="inc qtybutton">+</div>
                                </div>
                            </div>
                            <div class="add-to_cart">
                                <a class="add-to-cart-btn btn product-cart button-icon flosun-button dark-btn" data-id="{{ $car->CarID  }}">chọn thuê</a>
                                <!-- <a class="btn flosun-button secondary-btn secondary-border rounded-0" href="wishlist.html">Add to wishlist</a> -->
                            </div>
                        </div>
                        
                        
                        {{-- <div class="social-share mb-4">
                            <span>Share :</span>
                            <a href="#"><i class="fa fa-facebook-square facebook-color"></i></a>
                            <a href="#"><i class="fa fa-twitter-square twitter-color"></i></a>
                            <a href="#"><i class="fa fa-linkedin-square linkedin-color"></i></a>
                            <a href="#"><i class="fa fa-pinterest-square pinterest-color"></i></a>
                        </div>
                        <div class="payment">
                            <a href="#"><img class="border" src="assets/images/payment/payment-icon.png" alt="Payment"></a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row mt-no-text">
                <div class="col-lg-12 col-custom">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-uppercase" id="home-tab" data-bs-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" id="profile-tab" data-bs-toggle="tab" href="#connect-2" role="tab" aria-selected="false">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" id="contact-tab" data-bs-toggle="tab" href="#connect-3" role="tab" aria-selected="false">Shipping Policy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" id="review-tab" data-bs-toggle="tab" href="#connect-4" role="tab" aria-selected="false">Size Chart</a>
                        </li>
                    </ul>
                    <div class="tab-content mb-text" id="myTabContent">
                        <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="desc-content">
                                <p class="mb-3">{{ $car->Details }}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                            <!-- Start Single Content -->
                            <div class="product_tab_content  border p-3">
                                <div class="review_address_inner">
                                    <!-- Start Single Review -->
                                    <div class="pro_review mb-5">
                                        <div class="review_thumb">
                                            <img alt="review images" src="assets/images/review/1.jpg">
                                        </div>
                                        <div class="review_details">
                                            <div class="review_info mb-2">
                                                <div class="product-rating mb-2">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <h5>Admin - <span> December 19, 2022</span></h5>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in viverra ex, vitae vestibulum arcu. Duis sollicitudin metus sed lorem commodo, eu dapibus libero interdum. Morbi convallis viverra erat, et aliquet orci congue vel. Integer in odio enim. Pellentesque in dignissim leo. Vivamus varius ex sit amet quam tincidunt iaculis.</p>
                                        </div>
                                    </div>
                                    <!-- End Single Review -->
                                </div>
                                <!-- Start RAting Area -->
                                <div class="rating_wrap">
                                    <h5 class="rating-title-1 font-weight-bold mb-2">Add a review </h5>
                                    <p class="mb-2">Your email address will not be published. Required fields are marked *</p>
                                    <h6 class="rating-title-2 mb-2">Your Rating</h6>
                                    <div class="rating_list mb-4">
                                        <div class="review_info">
                                            <div class="product-rating mb-3">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End RAting Area -->
                                <div class="comments-area comments-reply-area">
                                    <div class="row">
                                        <div class="col-lg-12 col-custom">
                                            <form action="#" class="comment-form-area">
                                                <div class="row comment-input">
                                                    <div class="col-md-6 col-custom comment-form-author mb-3">
                                                        <label>Name <span class="required">*</span></label>
                                                        <input type="text" required="required" name="Name">
                                                    </div>
                                                    <div class="col-md-6 col-custom comment-form-emai mb-3">
                                                        <label>Email <span class="required">*</span></label>
                                                        <input type="text" required="required" name="email">
                                                    </div>
                                                </div>
                                                <div class="comment-form-comment mb-3">
                                                    <label>Comment</label>
                                                    <textarea class="comment-notes" required="required"></textarea>
                                                </div>
                                                <div class="comment-form-submit">
                                                    <button class="btn flosun-button secondary-btn rounded-0">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                        <div class="tab-pane fade" id="connect-3" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="shipping-policy">
                                <h4 class="title-3 mb-4">Shipping policy for our store</h4>
                                <p class="desc-content mb-2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate</p>
                                <ul class="policy-list mb-2">
                                    <li>1-2 business days (Typically by end of day)</li>
                                    <li><a href="#">30 days money back guaranty</a></li>
                                    <li>24/7 live support</li>
                                    <li>odio dignissim qui blandit praesent</li>
                                    <li>luptatum zzril delenit augue duis dolore</li>
                                    <li>te feugait nulla facilisi.</li>
                                </ul>
                                <p class="desc-content mb-2">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum</p>
                                <p class="desc-content mb-2">claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per</p>
                                <p class="desc-content mb-2">seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="connect-4" role="tabpanel" aria-labelledby="review-tab">
                            <div class="size-tab table-responsive-lg">
                                <h4 class="title-3 mb-4">Size Chart</h4>
                                <table class="table border">
                                    <tbody>
                                        <tr>
                                            <td class="cun-name"><span>UK</span></td>
                                            <td>18</td>
                                            <td>20</td>
                                            <td>22</td>
                                            <td>24</td>
                                            <td>26</td>
                                        </tr>
                                        <tr>
                                            <td class="cun-name"><span>European</span></td>
                                            <td>46</td>
                                            <td>48</td>
                                            <td>50</td>
                                            <td>52</td>
                                            <td>54</td>
                                        </tr>
                                        <tr>
                                            <td class="cun-name"><span>usa</span></td>
                                            <td>14</td>
                                            <td>16</td>
                                            <td>18</td>
                                            <td>20</td>
                                            <td>22</td>
                                        </tr>
                                        <tr>
                                            <td class="cun-name"><span>Australia</span></td>
                                            <td>28</td>
                                            <td>10</td>
                                            <td>12</td>
                                            <td>14</td>
                                            <td>16</td>
                                        </tr>
                                        <tr>
                                            <td class="cun-name"><span>Canada</span></td>
                                            <td>24</td>
                                            <td>18</td>
                                            <td>14</td>
                                            <td>42</td>
                                            <td>36</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product Main Area End -->
    <!--Product Area Start-->
    <div class="product-area mt-text-3">
        <div class="container custom-area-2 overflow-hidden">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12 col-custom">
                    <div class="section-title text-center mb-30">
                        <span class="section-title-1">The Most Trendy</span>
                        <h3 class="section-title-3">Featured Products</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row product-row">
                <div class="col-12 col-custom">
                    <div class="product-slider swiper-container anime-element-multi">
                        <div class="swiper-wrapper">
                            @foreach ($featuredProducts as $fcar)
                            <div class="single-item swiper-slide">
                                <!--Single Product Start-->
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="{{ asset('fontend/assets/images/product/' . $fcar->Image) }}" alt="" class="product-image-1 w-100">
                                            <img src="{{ asset('fontend/assets/images/product/' . $fcar->Image) }}" alt="" class="product-image-2 position-absolute w-100">
                                        </a>
                                        <span class="onsale">Sale!</span>
                                        <div class="add-action d-flex flex-column position-absolute">
                                            <a href="compare.html" title="Compare">
                                                <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                            </a>
                                            <a href="wishlist.html" title="Add To Wishlist">
                                                <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                            </a>
                                            <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                                <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details.html">{{ $fcar->CarName }}</a></h4>
                                        </div>
                                        <div class="product-rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fa fa-star{{ $fcar->Rate >= $i ? '' : '-o' }}"></i>
                                            @endfor
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price">
                                                {{ number_format($fcar->SalePrice ?? $fcar->Price, 0, ',', '.') }} ₫
                                            </span>
                                            @if ($fcar->SalePrice)
                                                <span class="old-price">
                                                    <del>{{ number_format($fcar->Price, 0, ',', '.') }} ₫</del>
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <button class="add-to-cart-btn btn btn-primary btn-lg w-100 mt-3">
                                    <i class="fa fa-car mr-2"></i> Rent This Car
                                </button>
                                    </div>
                                </div>
                                <!--Single Product End-->
                            </div>
                            @endforeach
                            
                          
                        </div>
                        <!-- Slider pagination -->
                        <div class="swiper-pagination default-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Product Area End-->
    <script>
        $(document).ready(function () {
            // Calculate rental days and total amount
            function updateRentalCalculations() {
                var pickupDate = new Date($('#pickup_date').val());
                var returnDate = new Date($('#return_date').val());
                var days = Math.ceil((returnDate - pickupDate) / (1000 * 60 * 60 * 24));
                var dailyRate = {{ $car->Price }};

                if (days < 1) days = 1;
                $('#rental_days').text(days);
                $('#total_amount').text(new Intl.NumberFormat('vi-VN').format(days * dailyRate) + ' VND');
            }

            // Update calculations when dates change
            $('#pickup_date, #return_date').change(function() {
                var pickup = new Date($('#pickup_date').val());
                var return_date = new Date($('#return_date').val());

                // Ensure return date is after pickup date
                if (return_date <= pickup) {
                    var nextDay = new Date(pickup);
                    nextDay.setDate(nextDay.getDate() + 1);
                    $('#return_date').val(nextDay.toISOString().split('T')[0]);
                }

                updateRentalCalculations();
            });

            // Handle add to cart
            $('.add-to-cart-btn').click(function (e) {
                e.preventDefault();
                var productId = {{ $car->CarID }}; // Make sure this matches your car ID field

                $.ajax({
                    url: "{{ route('cart.add.ajax') }}",
                    method: 'POST',
                    data: {
                        product_id: productId,
                        pickup_date: $('#pickup_date').val(),
                        return_date: $('#return_date').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        Swal.fire({
                            title: "Added to cart successfully!",
                            text: "The car has been added to your rental cart.",
                            icon: "success",
                            draggable: true
                        });
                        $('#cart-count').text(response.cart_count);
                    },
                    error: function () {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Failed to add to cart. Please try again.",
                        });
                    }
                });
            });

            // Initialize calculations
            updateRentalCalculations();
        });
    </script>
@endsection