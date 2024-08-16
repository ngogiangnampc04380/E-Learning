<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course_category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Post_category;

class PostController extends Controller
{
    public function list()
    {
         // Lấy danh sách các categories
    $categories = Course_Category::all();
return view('client.post.post-list');
    }

    public function detail()
    {
         // Lấy danh sách các categories
    $categories = Course_Category::all();
return view('client.post.post-detail');
    }

    public function posts(Request $request)
{
    $query = $request->input('query');

    $posts = Post::with('post_categories');

    

    $posts = $posts->paginate(5); // Adjust the number to control how many posts are shown per page

    $categories = Post_category::all();

     // Lấy danh sách các categories
    $categories = Course_Category::all();
return view('client.post.post-list', compact('posts', 'categories', 'query'));
}


    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Post_category::all(); // Lấy tất cả các danh mục

         // Lấy danh sách các categories
    $categories = Course_Category::all();
return view('client.post.post-detail', compact('post', 'categories'));
    }

    public function category_show($slug)
    {
        $categories = Post_category::all(); // Lấy tất cả các danh mục
        $category = Post_category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->with('post_categories')->get(); // Lấy tất cả các bài viết thuộc danh mục

         // Lấy danh sách các categories
    $categories = Course_Category::all();
return view('client.post.category-detail', compact('category', 'posts', 'categories'));
    }
}

