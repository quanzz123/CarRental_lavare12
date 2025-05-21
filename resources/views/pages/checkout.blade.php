@extends('page_layout')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4">Checkout</h2>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Car</th>
                                    <th>Price/Day</th>
                                    <th>Days</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach($cart as $id => $item)
                                    @php
                                        $days = max(1, \Carbon\Carbon::parse($item['pickup_date'])->diffInDays(\Carbon\Carbon::parse($item['return_date'])));
                                        $subtotal = $item['price'] * $days;
                                        $total += $subtotal;
                                    @endphp
                                    <tr>
                                        <td>
                                            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" style="width: 50px; height: auto;">
                                            {{ $item['name'] }}
                                        </td>
                                        <td>{{ number_format($item['price'], 0, ',', '.') }} VND</td>
                                        <td>{{ $days }}</td>
                                        <td>{{ number_format($subtotal, 0, ',', '.') }} VND</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Total:</strong></td>
                                    <td><strong>{{ number_format($total, 0, ',', '.') }} VND</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mt-4">
                        <form action="{{ url('/vnpay-payment') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <i class="fa fa-credit-card mr-2"></i> Pay with VNPay
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
