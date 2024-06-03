<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Post_category;


class PostController extends Controller
{
    public function list(){
        return view('client.post.post-list');
    }
    public function detail(){
        return view('client.post.post-detail');
    }
    public function posts()
    {
        $posts = Post::with('post_categories')->get();
        return view('client.post.post-list', compact('posts'));
        
    }
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = $post->post_categories; // Giả sử bạn đã định nghĩa mối quan hệ giữa Post và Category

        return view('client.post.post-detail', compact('post', 'categories'));
    }
    public function category_show($slug)
    {
        $category = Post_category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->with('post_categories')->get(); // Lấy tất cả các bài viết thuộc danh mục

        return view('client.post.category-detail', compact('category', 'posts'));
    }
}
