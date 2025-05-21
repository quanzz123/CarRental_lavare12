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
                    <h3>Edit Order #{{ $order->OrderID }}</h3>
                    <p class="text-subtitle text-muted">Update order information</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Orders</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Order #{{ $order->OrderID }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order Information</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.orders.update', $order->OrderID) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="OrderDate" class="form-label">Order Date</label>
                                    <input type="datetime-local" class="form-control @error('OrderDate') is-invalid @enderror" 
                                           id="OrderDate" name="OrderDate" 
                                           value="{{ old('OrderDate', $order->OrderDate ? $order->OrderDate->format('Y-m-d\TH:i') : '') }}">
                                    @error('OrderDate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="ReturnDate" class="form-label">Return Date</label>
                                    <input type="datetime-local" class="form-control @error('ReturnDate') is-invalid @enderror" 
                                           id="ReturnDate" name="ReturnDate" 
                                           value="{{ old('ReturnDate', $order->ReturnDate ? $order->ReturnDate->format('Y-m-d\TH:i') : '') }}">
                                    @error('ReturnDate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="StatusID" class="form-label">Status</label>
                                    <div class="form-group">
                                        <select class="choices form-select @error('StatusID') is-invalid @enderror" 
                                                id="StatusID" name="StatusID">
                                            <option value="">Select Status</option>
                                            @foreach($statuses as $status)
                                                <option value="{{ $status->StatusID }}" 
                                                    {{ old('StatusID', $order->StatusID) == $status->StatusID ? 'selected' : '' }}>
                                                    {{ $status->StatusDescription }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('StatusID')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="Deposit" class="form-label">Deposit Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control @error('Deposit') is-invalid @enderror" 
                                               id="Deposit" name="Deposit" value="{{ old('Deposit', $order->Deposit) }}">
                                    </div>
                                    @error('Deposit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="Payment" class="form-label">Payment Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control @error('Payment') is-invalid @enderror" 
                                               id="Payment" name="Payment" value="{{ old('Payment', $order->Payment) }}">
                                    </div>
                                    @error('Payment')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="Notes" class="form-label">Notes</label>
                                    <textarea class="form-control @error('Notes') is-invalid @enderror" 
                                              id="Notes" name="Notes" rows="3">{{ old('Notes', $order->Notes) }}</textarea>
                                    @error('Notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="bi bi-save"></i> Save Changes
                                </button>
                                <a href="{{ route('admin.orders.show', $order->OrderID) }}" class="btn btn-secondary">
                                    <i class="bi bi-x"></i> Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
