<?php

use App\BlogPost;

function readTime($content)
{
    $content = strip_tags(base64_decode($content));
    $mycontent = $content;
    $word = str_word_count(strip_tags($mycontent));
    $m = floor($word / 200);
    $s = floor($word % 200 / (200 / 60));
    if ($s > 15) {
        $m = $m + 1;
    }
    $estTime = $m . ' min read';
    return $estTime;
}

function getFullUrl($id)
{
    $blogPost = BlogPost::findOrFail($id);
    $url = "/" . $blogPost->created_at->format('Y') . "/" . $blogPost->created_at->format('m') . "/" . $blogPost->created_at->format('d') . "/" . $blogPost->permalink;

    return $url;
}

function getBlogPostTitle($id)
{
    $blogPost = BlogPost::findOrFail($id);
    $title = $blogPost->title;

    return $title;
}

function getUser()
{
    $user = Auth::user();
    return $user;
}
