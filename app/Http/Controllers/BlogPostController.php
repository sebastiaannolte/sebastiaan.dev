<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogPostController extends Controller
{
    public function visitPage($year, $month, $day, $permalink)
    {
        $blogPostCheck =  BlogPost::where('permalink', $permalink)->firstorfail();
        if ($blogPostCheck->created_at->format('Y') == $year && $blogPostCheck->created_at->format('m') == $month && $blogPostCheck->created_at->format('d') == $day) {
            $blogPost =  BlogPost::where('permalink', $permalink)->firstorfail();
            SEOMeta::setTitle($blogPost->title);
            SEOMeta::setDescription(substr(htmlentities(strip_tags(base64_decode($blogPost->content))), 0, 150) . '...');
        } else {
            //TODO: Set custom 404
            abort(404, 'Not Found');
        }
        $top3 = BlogPost::orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.post', [
            'blogPost' => $blogPost, 'top3' => $top3
        ]);
    }

    public function create(Request $request)
    {

        $blogPost = new BlogPost();

        $this->validate($request, [
            'title' => 'required|max:20|unique:blog_posts,title',
            'permalink' => 'required|max:20|unique:blog_posts,permalink',
            'content' => 'required',
        ]);

        $blogPost->title = $request->title;
        $blogPost->content = base64_encode($request->content);
        $blogPost->permalink = $request->permalink;
        $blogPost->save();
        return redirect('/posts');
    }
    public function delete($id)
    {
        $post = BlogPost::findOrFail($id);

        $post->delete();

        return redirect('/posts');
    }

    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);

        return view('admin.post.edit', [
            'blogPost' => $post
        ]);
    }

    public function save(Request $request, $id)
    {
        $blogPost = BlogPost::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|unique:blog_posts,title,' . $blogPost->id,
            'permalink' => 'required|unique:blog_posts,permalink,' . $blogPost->id,
            'content' => 'required',
        ]);


        $blogPost->title = $request->title;
        $blogPost->permalink = $request->permalink;
        $blogPost->content = base64_encode($request->content);

        $blogPost->save();

        return redirect('/posts');
    }

    public function new()
    {
        return view('admin.post.new');
    }
}
