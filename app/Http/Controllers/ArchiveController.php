<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;

class ArchiveController extends Controller
{


    public function index()
    {
        SEOMeta::setTitle('Archive');
        SEOMeta::setDescription('View all the blogposts written by Sebastiaan Nolte');
        $posts_by_date = BlogPost::orderBy('created_at', 'desc')->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('Y');
        });
        return view('pages.archive', [
            'posts_by_date' => $posts_by_date
        ]);
    }
}
