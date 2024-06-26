<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');
    $type = $request->input('type');

    if ($type === 'course') {
        // Tìm kiếm khóa học với status = 2
        $data = DB::table('courses')
            ->where('status', 2)
            ->where('name', 'LIKE', "%{$query}%")
            ->orderBy('id', 'desc')
            ->get();

        return view('client.courses.courses-list', ['data' => $data, 'query' => $query]);
    } elseif ($type === 'mentor') {
        // Tìm kiếm giảng viên
        $currentUserId = Auth::id();
        $data = DB::table('users')
            ->where('role', 2)
            ->where('name', 'LIKE', "%{$query}%")
            ->where('id', '!=', $currentUserId)
            ->get();

        return view('client.instructor.instructor-list', ['data' => $data, 'query' => $query]);
    }

    // Trường hợp không khớp với loại nào cả
    return redirect()->back()->with('error', 'Invalid search type.');
}

}