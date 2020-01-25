<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Artesaos\SEOTools\Facades\SEOMeta;

class HomeController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Blog of Sebastiaan Nolte');
        SEOMeta::setDescription('Portfolio website of Sebastiaan Nolte');
        $blogPosts = BlogPost::orderby('created_at', 'desc')->paginate(1);
        return view('pages.home', [
            'blogPosts' => $blogPosts

        ]);
    }
}
