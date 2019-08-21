<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = BlogPost::all()->sortByDesc("updated_at");
        return view('admin.post.posts', [
            'posts' => $posts

        ]);
    }
}
