@foreach ( $recentcars as $r )
<div class="sidebar-product align-items-center">
    <a href="product-details.html" class="image">
        <img src="{{asset('fontend/assets/images/product/' . $r->Image)}}" alt="product">
    </a>
    <div class="product-content">
        <div class="product-title">
            <h4 class="title-2"> <a href="product-details.html">{{$r->CarName}}</a></h4>
        </div>
        <div class="price-box">
            <span class="regular-price ">$80.00</span>
            <span class="old-price"><del>$90.00</del></span>
        </div>
        <div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
            <i class="fa fa-star-o"></i>
        </div>
    </div>
</div> 
@endforeach

