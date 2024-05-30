<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Sale;
use App\Models\Course;
class SaleController extends Controller
{
    public function index(){
        
        $data = Course::select('name','id')->get();
        //dd==($data);
        return view('mentor.sales.sales',['data'=>$data]);
    }

    public function AddSale(Request $request){
        
            // dd(123);
            $validator = Validator::make($request->all(), [
            'price_sale' => 'required',
            'sales_code' => 'required',
            'amount' => 'required',
            'status' => 'required',
            
        ],
            [
                'price_sale.required' => 'không được để trống',
                'sales_code.required' => 'không được để trống',
                'amount.required' => 'không được để trống',
                'status.required'=> 'không được để trống',
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            //tìm mail lúc đầu người dùng nhập để lấy mã xác nhận(send code) để đổi mật khẩu
            Sale::create([
                'price_sale' => $request->price_sale,
                'sales_code' => $request->sales_code,
                'amount' => $request->amount,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
                'course_id'=>$request->course_id,
                
                
            ]);
            return redirect()->route('Dashboard-client')->withSuccess('tạo mã sale thành công !');
        }
       
       
       ;
    }
    
}
