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
  
      // Sort input data
      ksort($inputData);
      $i = 0;
      $hashData = "";
      $query = "";
      
      // Build hash data and query string
      foreach ($inputData as $key => $value) {
          if ($i == 1) {
              $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
          } else {
              $hashData .= urlencode($key) . "=" . urlencode($value);
              $i = 1;
          }
          $query .= urlencode($key) . "=" . urlencode($value) . '&';
      }

      // Calculate secure hash
      $vnpSecureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
      
      // Build final URL
      $vnp_Url = $vnp_Url . "?" . $query;
      $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

      // Log payment initialization data
      \Log::info('VNPay Payment Init:', [
          'input_data' => $inputData,
          'hash_data' => $hashData,
          'secure_hash' => $vnpSecureHash,
          'final_url' => $vnp_Url
      ]);
      // Direct redirect to VNPay
      return redirect()->away($vnp_Url);
    }

public function vnpay_return(Request $request)
    {
        if (!$request->has(['vnp_SecureHash', 'vnp_ResponseCode'])) {
            return redirect('/checkout')->with('error', 'Invalid payment response.');
        }

        $vnp_HashSecret = "9S3YAJDEW2ANN0MFF1RMKH6GL7TUUQD4";

        $inputData = array();
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHashCheck = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        // For debugging
        \Log::info('VNPay Return Data:', [
            'request_data' => $request->all(),
            'input_data' => $inputData,
            'hash_data' => $hashData,
            'secure_hash_check' => $secureHashCheck,
            'vnp_secure_hash' => $request->vnp_SecureHash
        ]);

        if (strcasecmp($secureHashCheck, $request->vnp_SecureHash) === 0) {
            if ($request->vnp_ResponseCode == '00') {
            try {
                // Validate cart exists
                if (!session()->has('cart') || empty(session('cart'))) {
                    throw new \Exception('Cart is empty');
                }

                DB::beginTransaction();

                // Log the start of transaction
                \Log::info('Starting order creation for VNPay transaction: ' . $request->vnp_TxnRef);

                // Create new order
                $order = new TblCarrentailorder();
                $order->CustomerID = Auth::id();
                $order->OrderDate = Carbon::now();
                $order->Payment = $request->vnp_Amount / 100; // Convert from VND cents to VND
                $order->Deposit = 0;
                $order->StatusID = 1; // Paid status
                $order->Notes = 'Paid via VNPAY. Transaction: ' . $request->vnp_TxnRef;
                
                // Log order data before saving
                \Log::info('Order data:', ['order' => $order->toArray()]);
                
                if (!$order->save()) {
                    throw new \Exception('Failed to create order');
                }

                // Insert order details from cart
                $cart = session('cart');
                foreach ($cart as $carId => $item) {
                    try {
                        $pickupDate = Carbon::parse($item['pickup_date']);
                        $returnDate = Carbon::parse($item['return_date']);
                        
                        $orderDetail = new TblOrderdetail([
                            'OrderID' => $order->OrderID,
                            'CarID' => $carId,
                            'Price' => $item['price'],
                            'Quantity' => max(1, $pickupDate->diffInDays($returnDate)),
                            'Description' => $item['name'],
                            'PickupDate' => $pickupDate,
                            'ReturnDate' => $returnDate
                        ]);

                        // Log order detail data before saving
                        \Log::info('Order detail data:', ['detail' => $orderDetail->toArray()]);

                        if (!$orderDetail->save()) {
                            throw new \Exception('Failed to save order detail for car: ' . $item['name']);
                        }
                    } catch (\Exception $e) {
                        throw new \Exception('Error processing car ' . $item['name'] . ': ' . $e->getMessage());
                    }
                }

                DB::commit();
                \Log::info('Order creation completed successfully');

                // Clear cart after successful order
                session()->forget(['cart', 'cart_total']);

                return redirect('/thank-you')->with('success', 'Payment successful! Your order ID is: ' . $order->OrderID);
            } catch (\Exception $e) {
                DB::rollBack();
                \Log::error('Order creation failed: ' . $e->getMessage());
                return redirect('/checkout')->with('error', 'An error occurred while processing your order: ' . $e->getMessage());
            }
        } else {
                // Payment was not successful
                $errorMessages = [
                    '01' => 'Giao dịch thất bại',
                    '02' => 'Giao dịch bị từ chối',
                    '07' => 'Giao dịch bị nghi ngờ gian lận',
                    '09' => 'Khách hàng đã hủy giao dịch',
                    '10' => 'Xác minh khách hàng không thành công',
                    '11' => 'Chờ khách hàng thanh toán',
                    '12' => 'Giao dịch không hợp lệ',
                    '13' => 'Số tiền giao dịch vượt quá hạn mức cho phép',
                    '24' => 'Khách hàng đã hủy giao dịch',
                    '51' => 'Số dư tài khoản không đủ',
                    '65' => 'Giao dịch vượt quá hạn mức trong ngày',
                    '75' => 'Vượt quá số lần nhập sai mã PIN cho phép',
                    '79' => 'Định dạng thẻ không hợp lệ',
                    '99' => 'Lỗi kết nối. Vui lòng thử lại.',
                ];

                $errorMessage = $errorMessages[$request->vnp_ResponseCode] ?? 'Payment failed. Please try again.';
                return redirect('/checkout')->with('error', $errorMessage);
            }
        } else {
            return redirect('/checkout')->with('error', 'Invalid payment signature.');
        }
    }

    public function thankYou()
    {
        if (!session('success')) {
            return redirect('/shop');
        }
        return view('pages.thank-you');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect('/shop')->with('error', 'Your cart is empty!');
        }
        return view('pages.checkout', ['cart' => $cart]);
    }

  
}
