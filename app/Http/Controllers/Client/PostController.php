<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Post_category;

class PostController extends Controller
{
    public function list()
    {
        return view('client.post.post-list');
    }

    public function detail()
    {
        return view('client.post.post-detail');
    }

    public function posts()
    {
        $posts = Post::with('post_categories')->get();
        $categories = Post_category::all(); // Lấy tất cả các danh mục

        return view('client.post.post-list', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Post_category::all(); // Lấy tất cả các danh mục

        return view('client.post.post-detail', compact('post', 'categories'));
    }

    public function category_show($slug)
    {
        $categories = Post_category::all(); // Lấy tất cả các danh mục
        $category = Post_category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->with('post_categories')->get(); // Lấy tất cả các bài viết thuộc danh mục

        return view('client.post.category-detail', compact('category', 'posts', 'categories'));
    }
}

