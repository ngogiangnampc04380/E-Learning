<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Course;
use App\Models\SalePivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function applyPromotion(Request $request)
    {
        $courseId = $request->input('course_id'); // Lấy course_id từ request
        $discount_code = $request->input('discount_code'); // Lấy sales_code từ request
        $savepivot = SalePivot::where('course_id', $courseId)->first();

        $sales = DB::table('sales')->where('id', $savepivot->sale_id)->first();

        
        // dd($sales);
        // dd($discount_code);
        $sale = DB::table('sales')
            ->where('id', $savepivot->sale_id)
            ->where('discount_code', $discount_code)
            ->where('end_date', '>=', now())
            ->where('start_date', '<=', now())

            ->where('used_quantity', '<', $sales->quantity)

            ->first();
        // dd($sale);
        if ($sale) {
            $course = Course::findOrFail($courseId);
            $originalPrice = $course->price;
            $discountedPrice = $originalPrice * ((100 - $sale->discount_percent) / 100);
            session([
                'sale_code' => $sale->discount_code,
                'price' => $discountedPrice,
            ]);
            return view('client.courses.course-pricing', compact('originalPrice', 'discountedPrice', 'sale', 'course'));
        } else {
            $course = Course::findOrFail($courseId);
            $originalPrice = $course->price;
            session([
                'price' => $originalPrice,
            ]);
            return back()->with('error', 'Mã khuyến mãi không hợp lệ hoặc đã hết giá trị sử dụng.');
        }
    }
}
