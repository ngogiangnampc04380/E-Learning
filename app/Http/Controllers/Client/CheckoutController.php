<?php

namespace App\Http\Controllers\Client;

use App\Models\Client\Checkout;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Course;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CAINFO, 'D:\cacert.pem');
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        if ($result === false) {
            // Xử lý trường hợp yêu cầu không thành công
            echo 'Lỗi cURL: ' . curl_error($ch);
        } else {
            // Xử lý dữ liệu trả về thành công
            return $result;
        }


        //close connection
        curl_close($ch);
        return $result;

    }


    public function online_pay(request $request)
    {
        // $discountedPrice = $request->input('discounted_price');
        if (isset($_POST['payUrl'])) {
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = session('price');
            $orderId = rand(00, 9999);
            // $resultCode	= "resultCode";
            $redirectUrl = "http://127.0.0.1:8000/client/thank";
            $ipnUrl = "http://127.0.0.1:8000";
            $extraData = "";
            $requestId = time() . "";
            $requestType = "payWithATM";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            // before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey .
                "&amount=" . $amount .
                "&extraData=" . $extraData .
                "&ipnUrl=" . $ipnUrl .
                "&orderId=" . $orderId .
                "&orderInfo=" . $orderInfo .
                "&partnerCode=" . $partnerCode .
                "&redirectUrl=" . $redirectUrl .
                "&requestId=" . $requestId .
                "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);

            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );

            // Gửi yêu cầu POST và nhận kết quả
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true); // decode json thành mảng associative

            // In ra kết quả để gỡ lỗi

        }


        // dd($jsonResult);


        return redirect()->to($jsonResult['payUrl']);
    }

    public function thank()
    {
        $orderID = $_GET['orderId'];

        $orderid = DB::table('orders')
        ->select('order_code')
        ->where('order_code', $orderID)
        ->first();

        if (isset($_GET['partnerCode']) && $_GET['message'] == "Successful." &&  $orderid == null) {
            Order::create([
                'order_code' => $_GET['orderId'],
                'fullname' => session('fullname'),
                'phone' => session('phone'),
                'email' => session('email'),
                'address' => session('address'),
                'course_id' => session('course_id'),
                'user_id' => session('id'),
                'price_paid' => session('price'),
            ]);
            $used_cupon = DB::table('sales')
            ->where('sales_code', session('sale_code'))
            ->select('used_amount')
            ->first();
            $used_cupon->used_amount = $used_cupon->used_amount + 1;
            DB::table('sales')
            ->where('sales_code', session('sale_code'))
            ->update(['used_amount' => $used_cupon->used_amount]);
        }
        return view('client.checkout.thank');
    }
}
