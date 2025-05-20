<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TblCarrentailorder;
use App\Models\TblOrderdetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    //
    public function vnpay_payment(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        // Calculate total from cart based on rental days
        $total = 0;
        foreach ($cart as $item) {
            $pickup_date = Carbon::parse($item['pickup_date']);
            $return_date = Carbon::parse($item['return_date']);
            $days = max(1, $pickup_date->diffInDays($return_date));
            $total += $item['price'] * $days;
        }

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = url('/vnpay-return'); // Update this to your actual return URL
        $vnp_TmnCode = "QJXKWX4S"; //Mã website tại VNPAY 
        $vnp_HashSecret = "9S3YAJDEW2ANN0MFF1RMKH6GL7TUUQD4"; //Chuỗi bí mật
  
      $vnp_TxnRef = 'CR' . time() . rand(100, 999); // Create unique order code
      $vnp_OrderInfo = 'Car Rental Payment';
      $vnp_OrderType = 'billpayment';
      $vnp_Amount = $total * 100; // Convert to VND cents
      $vnp_Locale = 'vn';
      // $vnp_BankCode = 'NCB';
      $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
  
      $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
  
      );
  
      if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
      }
      if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
      }
  
      //var_dump($inputData);
      ksort($inputData);
      $query = "";
      $i = 0;
      $hashdata = "";
      foreach ($inputData as $key => $value) {
        if ($i == 1) {
          $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
          $hashdata .= urlencode($key) . "=" . urlencode($value);
          $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
      }
  
      $vnp_Url = $vnp_Url . "?" . $query;
      if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
      }
      // Direct redirect to VNPay
      return redirect()->away($vnp_Url);
    }

public function vnpay_return(Request $request)
    {
        $vnp_HashSecret = "9S3YAJDEW2ANN0MFF1RMKH6GL7TUUQD4";

        $inputData = $request->all();
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        unset($inputData['vnp_SecureHashType']);
        ksort($inputData);
        $hashData = urldecode(http_build_query($inputData));

        $secureHashCheck = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHashCheck === $vnp_SecureHash && $request->vnp_ResponseCode == '00') {
            try {
                DB::beginTransaction();

                // Create new order
                $order = new TblCarrentailorder();
                $order->CustomerID = Auth::id();
                $order->OrderDate = Carbon::now();
                $order->Payment = $request->vnp_Amount / 100; // Convert from VND cents to VND
                $order->Deposit = 0; // Set deposit amount if needed
                $order->StatusID = 1; // Assuming 1 is for 'Paid' in tblOrderstatus
                $order->Notes = 'Paid via VNPAY. Transaction: ' . $request->vnp_TxnRef;
                $order->save();

                // Insert order details from cart
                if (session()->has('cart')) {
                    foreach (session('cart') as $carId => $item) {
                        $orderDetail = new TblOrderdetail();
                        $orderDetail->OrderID = $order->OrderID;
                        $orderDetail->CarID = $carId; // Using the cart key as CarID
                        $orderDetail->Price = $item['price'];
                        $orderDetail->Quantity = Carbon::parse($item['pickup_date'])->diffInDays(Carbon::parse($item['return_date']));
                        $orderDetail->Description = $item['name'];
                        $orderDetail->PickupDate = Carbon::parse($item['pickup_date']);
                        $orderDetail->ReturnDate = Carbon::parse($item['return_date']);
                        $orderDetail->save();
                    }
                }

                DB::commit();

                // Clear cart after successful order
                session()->forget('cart');
                session()->forget('cart_total');

                return redirect('/thank-you')->with('success', 'Payment successful! Your order ID is: ' . $order->OrderID);
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect('/checkout')->with('error', 'An error occurred while processing your order. Please try again.');
            }
        } else {
            return redirect('/checkout')->with('error', 'Payment failed or was cancelled.');
        }
    }

  
}
