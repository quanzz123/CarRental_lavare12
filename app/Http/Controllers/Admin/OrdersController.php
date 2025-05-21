<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TblCarrentailorder;
use App\Models\TblOrderstatus;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = TblCarrentailorder::with(['tbl_customer', 'tbl_orderstatus'])
            ->orderBy('OrderDate', 'desc')
            ->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = TblCarrentailorder::with(['tbl_customer', 'tbl_orderstatus', 'tbl_orderdetails'])
            ->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = TblCarrentailorder::with(['tbl_customer', 'tbl_orderstatus', 'tbl_orderdetails'])
            ->findOrFail($id);
        $statuses = TblOrderstatus::all();
        return view('admin.orders.edit', compact('order', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'OrderDate' => 'nullable|date',
            'ReturnDate' => 'nullable|date',
            'Deposit' => 'nullable|numeric|min:0',
            'Payment' => 'nullable|numeric|min:0',
            'StatusID' => 'required|exists:tbl_orderstatus,StatusID',
            'Notes' => 'nullable|string|max:1000',
        ]);

        $order = TblCarrentailorder::findOrFail($id);
        $order->update($request->only([
            'OrderDate',
            'ReturnDate',
            'Deposit',
            'Payment',
            'StatusID',
            'Notes',
        ]));

        return redirect()
            ->route('admin.orders.show', $order->OrderID)
            ->with('success', 'Order updated successfully');
    }
}
