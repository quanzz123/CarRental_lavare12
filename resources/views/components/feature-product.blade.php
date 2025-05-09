
@foreach ($cars as $car)
<div class="single-item swiper-slide">
    <!--Single Product Start-->
    <div class="single-product position-relative mb-30">
        <div class="product-image">
            <a class="d-block" href="product-details.html">
                <img src="{{asset('fontend/assets/images/product/'. $car->Image)}}" alt="" class="product-image-1 w-100">
                <img src="{{asset('fontend/assets/images/product/'. $car->Image)}}" alt="" class="product-image-2 position-absolute w-100">
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
                <h4 class="title-2"> <a href="{{url('shop/'. $car->Alias)}}">{{$car->CarName}}</a></h4>
            </div>
            <div class="product-rating">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="fa fa-star{{ $car->Rate >= $i ? '' : '-o' }}"></i>
                @endfor
            </div>
            <div class="price-box">
                <span class="regular-price">${{ $car->SalePrice ?? $car->Price }}</span>
                @if ($car->SalePrice)
                    <span class="old-price"><del>${{ $car->Price }}</del></span>
                @endif
            </div>
            <a href="cart.html" class="btn product-cart">Add to Cart</a>
        </div>
    </div>
    <!--Single Product End-->
    <!--Single Product Start-->
    <!-- <div class="single-product position-relative mb-30">
        <div class="product-image">
            <a class="d-block" href="product-details.html">
                <img src="public/fontend/assetsimages/product/3.jpg" alt="" class="product-image-1 w-100">
                <img src="public/fontend/assetsimages/product/4.jpg" alt="" class="product-image-2 position-absolute w-100">
            </a>
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
                <h4 class="title-2"> <a href="product-details.html">Jasmine flowers white</a></h4>
            </div>
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <div class="price-box">
                <span class="regular-price ">$80.00</span>
                <span class="old-price"><del>$90.00</del></span>
            </div>
            <a href="cart.html" class="btn product-cart">Add to Cart</a>
        </div>
    </div> -->
    <!--Single Product End-->
</div>
@endforeach
