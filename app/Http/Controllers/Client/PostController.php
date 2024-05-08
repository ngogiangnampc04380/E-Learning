<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function list(){
        return view('client.post.post-list');
    }
    public function detail(){
        return view('client.post.post-detail');
    }
}
