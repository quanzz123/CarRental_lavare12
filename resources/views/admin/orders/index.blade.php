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
                    <h3>Orders Management</h3>
                    <p class="text-subtitle text-muted">View and manage all orders</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
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
                    <h4 class="mb-sm-0">Orders Management</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
            <table id="ordersTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Order Date</th>
                        <th>Return Date</th>
                        <th>Deposit</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->OrderID }}</td>
                        <td>{{ $order->tbl_customer ? $order->tbl_customer->Name : 'N/A' }}</td>
                        <td>{{ $order->OrderDate ? $order->OrderDate->format('Y-m-d H:i') : 'N/A' }}</td>
                        <td>{{ $order->ReturnDate ? $order->ReturnDate->format('Y-m-d H:i') : 'N/A' }}</td>
                        <td>${{ number_format($order->Deposit, 2) }}</td>
                        <td>${{ number_format($order->Payment, 2) }}</td>
                        <td>
                            <span class="badge bg-{{ $order->tbl_orderstatus ? 
                                ($order->tbl_orderstatus->StatusID == 1 ? 'success' : 
                                ($order->tbl_orderstatus->StatusID == 2 ? 'danger' : 
                                ($order->tbl_orderstatus->StatusID == 3 ? 'warning' : 
                                ($order->tbl_orderstatus->StatusID == 4 ? 'info' : 'secondary')))) : 'secondary' }}">
                                {{ $order->tbl_orderstatus ? $order->tbl_orderstatus->StatusDescription : 'Unknown' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->OrderID) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('admin.orders.edit', $order->OrderID) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#ordersTable').DataTable({
            order: [[2, 'desc']],
            pageLength: 25
        });
    });
</script>
@endpush
@endsection