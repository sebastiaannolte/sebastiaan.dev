<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Artesaos\SEOTools\Facades\SEOMeta;

class HomeController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('Portfolio website of Sebastiaan Nolte');
        $blogPosts = BlogPost::orderby('created_at', 'desc')->paginate(3);
        return view('pages.home', [
            'blogPosts' => $blogPosts

        ]);
    }
}
