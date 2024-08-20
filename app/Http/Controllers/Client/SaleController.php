<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SalePivot;
use App\Models\Course;
use Carbon\Carbon;

class SaleController extends Controller
{
    public function show()
    {
        $sales = Sale::with('courses')->get();

        // Chuyển đổi ngày tháng sử dụng Carbon trước khi gửi đến view
        foreach ($sales as $sale) {
            $sale->start_date = Carbon::parse($sale->start_date);
            $sale->end_date = Carbon::parse($sale->end_date);
        }
        return view('sale.show-sale', compact('sales'));
    }
    public function create()
    {
        $courses = Course::all();
        return view('sale.add-sale', compact('courses'));
    }
    public function store(Request $request)
    {
        $sale = Sale::create([
            'mentor_id' => auth()->user()->mentor->id,
            'discount_title' => $request->discount_title,
            'discount_percent' => $request->discount_percent,
            'discount_code' => $request->discount_code,
            'quantity' => $request->quantity,
            'used_quantity' => 0,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        $courses = $request->input('courses');
        foreach ($courses as $course_id) {
            SalePivot::create([
                'course_id' => $course_id,
                'sale_id' => $sale->id,
            ]);
        }
        return redirect()->route('sale.add-sale')->with('success', 'Mã giảm giá đã được thêm thành công!');
    }
    public function edit(Sale $sale)
    {
        $courses = Course::all(); // Lấy tất cả khóa học để hiển thị trong form
        $selectedCourses = $sale->courses->pluck('id')->toArray(); // Lấy danh sách các khóa học đã chọn

        return view('sale.edit-sale', compact('sale', 'courses', 'selectedCourses'));
    }

    // Phương thức để cập nhật thông tin mã giảm giá
    public function update(Request $request, Sale $sale)
    {
        // Cập nhật thông tin mã giảm giá
        $sale->update([
            'discount_title' => $request->discount_title,
            'discount_percent' => $request->discount_percent,
            'discount_code' => $request->discount_code,
            'quantity' => $request->quantity,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        // Cập nhật khóa học liên quan
        $sale->courses()->sync($request->courses); // Đồng bộ lại các khóa học

        return redirect()->route('sale.show-sale')->with('success', 'Mã giảm giá đã được cập nhật thành công!');
    }
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sale.show-sale')->with('success', 'Mã giảm giá đã được xóa thành công!');
    }

}
