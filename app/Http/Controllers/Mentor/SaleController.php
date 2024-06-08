<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function showSaleCourseForm()
    {
        $data = DB::table('courses')
            ->orderBy('id', 'desc')
            ->get();
        return view('mentor.sales.sales', ['data' => $data]);
    }

    public function showSaleCourseList()
    {
        $list = DB::table('sales')
            ->join('courses', 'sales.course_id', '=', 'courses.id')
            ->select('sales.*', 'courses.name as courseName')
            ->get();
        return view('mentor.sales.salesList', ['list' => $list]);
    }

    public function editSales($id)
    {
        $sale = Sale::findOrFail($id);
        $courses = Course::all();
        return view('mentor.sales.editSales', ['sale' => $sale, 'courses' => $courses]);
    }

    public function updateSales(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'percent_sale' => 'required|numeric|min:0|max:100',
            'sales_code' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id'
        ]);

        $sale = Sale::findOrFail($id);
        $sale->update([
            'name' => $request->name,
            'description' => $request->description,
            'percent_sale' => $request->percent_sale,
            'sales_code' => $request->sales_code,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'amount' => $request->amount,
            'status' => $request->status,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('mentor.list-sale-course')->with('success', 'Sale updated successfully!');
    }

    public function deleteSale($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('mentor.list-sale-course')->with('success', 'Sale deleted successfully!');
    }

    public function storeSale(Request $request)
    {
        $sale = new Sale();
        $sale->name = $request->name;
        $sale->description = $request->description;
        $sale->percent_sale = $request->percent_sale;
        $sale->sales_code = $request->sales_code;
        $sale->start_date = $request->start_date;
        $sale->end_date = $request->end_date;
        $sale->amount = $request->amount;
        $sale->status = $request->status;
        $sale->course_id = $request->course_id;
        $sale->save();
        return redirect()->route('mentor.list-sale-course')->with('success', 'Sale added successfully!');
    }
}

