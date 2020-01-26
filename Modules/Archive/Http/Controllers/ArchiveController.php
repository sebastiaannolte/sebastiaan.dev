<?php

namespace Modules\Archive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Modules\Archive\Entities\BlogPost;

class ArchiveController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Archive');
        SEOMeta::setDescription('View all the blogposts written by Sebastiaan Nolte');
        $posts_by_date = BlogPost::orderBy('created_at', 'desc')->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('Y');
        });
        return view('archive::index', [
            'posts_by_date' => $posts_by_date
        ]);
    }
}
