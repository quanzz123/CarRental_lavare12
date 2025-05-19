<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function vnpay_payment(Request $request)
    {
      $data = $request->all();
      $code_cart = rand(00, 9999);
      $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
      $vnp_Returnurl = "http://localhost:81/weblinhkienmaytinh/checkout";
      $vnp_TmnCode = "QJXKWX4S"; //Mã website tại VNPAY 
      $vnp_HashSecret = "9S3YAJDEW2ANN0MFF1RMKH6GL7TUUQD4"; //Chuỗi bí mật
  
      $vnp_TxnRef = $code_cart; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
      $vnp_OrderInfo = 'Thanh toán đơn hàng test';
      $vnp_OrderType = 'billpayment';
      $vnp_Amount = $data['total_vnpay'] * 100;
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
      $returnData = array(
        'code' => '00',
        'message' => 'success',
        'data' => $vnp_Url
      ); 
      if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
        die();
      } else {
        echo json_encode($returnData);
      }
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
        //  Thành công — lưu đơn hàng vào DB

        $order = new Order();
        $order->order_code = $request->vnp_TxnRef;
        $order->amount = $request->vnp_Amount / 100; // chia lại
        $order->status = 'Đã thanh toán';
        $order->created_at = now();
        $order->save();

        // Giả sử bạn có session lưu giỏ hàng
        foreach (session('cart') as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['quantity']
            ]);
        }

        session()->forget('cart'); // Xoá giỏ hàng
        session()->forget('cart_total');

        return redirect('/thank-you')->with('message', 'Thanh toán thành công, mã đơn hàng: ' . $order->order_code);
    } else {
        return redirect('/checkout')->with('error', 'Thanh toán thất bại hoặc bị hủy');
    }
}

  
}
