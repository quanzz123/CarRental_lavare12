@extends('admin_layout')
@section('admin')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Order Details</h3>
                    <p class="text-subtitle text-muted">View order information</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Orders</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order #{{ $order->OrderID }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Order Details #{{ $order->OrderID }}</h4>
                    <div class="page-title-right">
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to List</a>
                        <a href="{{ route('admin.orders.edit', $order->OrderID) }}" class="btn btn-primary">Edit Order</a>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Customer Information</h4>
                    @if($order->tbl_customer)
                        <h5>{{ $order->tbl_customer->Name }}</h5>
                        <p class="mb-1"><strong>Email:</strong> {{ $order->tbl_customer->Email }}</p>
                        <p class="mb-1"><strong>Phone:</strong> {{ $order->tbl_customer->Phone }}</p>
                        <p class="mb-1"><strong>Address:</strong> {{ $order->tbl_customer->Address }}</p>
                    @else
                        <p>No customer information available</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Order Information</h4>
                    <p class="mb-1"><strong>Order Date:</strong> {{ $order->OrderDate ? $order->OrderDate->format('Y-m-d H:i') : 'N/A' }}</p>
                    <p class="mb-1"><strong>Return Date:</strong> {{ $order->ReturnDate ? $order->ReturnDate->format('Y-m-d H:i') : 'N/A' }}</p>
                    <p class="mb-1"><strong>Status:</strong> 
                        <span class="badge bg-{{ $order->tbl_orderstatus ? 
                            ($order->tbl_orderstatus->StatusID == 1 ? 'success' : 
                            ($order->tbl_orderstatus->StatusID == 2 ? 'danger' : 
                            ($order->tbl_orderstatus->StatusID == 3 ? 'warning' : 
                            ($order->tbl_orderstatus->StatusID == 4 ? 'info' : 'secondary')))) : 'secondary' }}">
                            {{ $order->tbl_orderstatus ? $order->tbl_orderstatus->StatusDescription : 'Unknown' }}
                        </span>
                    </p>
                    <p class="mb-1"><strong>Deposit:</strong> ${{ number_format($order->Deposit, 2) }}</p>
                    <p class="mb-1"><strong>Payment:</strong> ${{ number_format($order->Payment, 2) }}</p>
                    @if($order->Notes)
                        <p class="mb-1"><strong>Notes:</strong> {{ $order->Notes }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Rented Cars</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Car</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Pickup Date</th>
                        <th>Return Date</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->tbl_orderdetails as $detail)
                        <tr>
                            <td>{{ $detail->tbl_cars ? $detail->tbl_cars->CarName : 'N/A' }}</td>
                            <td>{{ $detail->Quantity }}</td>
                            <td>${{ number_format($detail->Price, 2) }}</td>
                            <td>{{ $detail->PickupDate ? $detail->PickupDate->format('Y-m-d') : 'N/A' }}</td>
                            <td>{{ $detail->ReturnDate ? $detail->ReturnDate->format('Y-m-d') : 'N/A' }}</td>
                            <td>${{ number_format($detail->Price * $detail->Quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total:</strong></td>
                        <td><strong>${{ number_format($order->tbl_orderdetails->sum(function($detail) { return $detail->Price * $detail->Quantity; }), 2) }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
