@extends('page_layout')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    @if(session('success'))
                        <div class="mb-4">
                            <i class="fa fa-check-circle text-success" style="font-size: 48px;"></i>
                        </div>
                        <h2 class="card-title mb-4">Cảm ơn bạn đã sử dụng dịch vụ!</h2>
                        <p class="card-text">{{ session('success') }}</p>
                        <p class="card-text">Chúng tôi sẽ xử lý yêu cầu thuê xe của bạn sớm nhất có thể.</p>
                        <div class="mt-4">
                            <a href="{{ url('/shop') }}" class="btn btn-primary">Tiếp tục mua sắm</a>
                            <a href="{{ url('/profile') }}" class="btn btn-outline-primary">Xem đơn hàng của bạn</a>
                        </div>
                    @else
                        <div class="mb-4">
                            <i class="fa fa-times-circle text-danger" style="font-size: 48px;"></i>
                        </div>
                        <h2 class="card-title mb-4">Oops! Something went wrong.</h2>
                        <p class="card-text">We couldn't find your order information.</p>
                        <div class="mt-4">
                            <a href="{{ url('/shop') }}" class="btn btn-primary">Continue Shopping</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
