<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;


use Artesaos\SEOTools\Facades\SEOMeta;
use Modules\Archive\Entities\BlogPost;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BlogController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Blog of Sebastiaan Nolte');
        SEOMeta::setDescription('Portfolio website of Sebastiaan Nolte');
        $blogPosts = BlogPost::orderby('created_at', 'desc')->paginate(3);
        return view('blog::index', [
            'blogPosts' => $blogPosts

        ]);
    }

    public function posts()
    {
        SEOMeta::setTitle('Posts');

        $posts = BlogPost::orderbyDesc('updated_at')->paginate(10);
        return view('blog::admin/posts', [
            'posts' => $posts

        ]);
    }

    public function post($year, $month, $day, $permalink)
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
        $top3 = BlogPost::orderByDesc('created_at')->take(3)->get();
        return view('blog::post', [
            'blogPost' => $blogPost, 'top3' => $top3
        ]);
    }

    public function store(Request $request)
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

        return redirect()->route('admin.posts')
            ->with('success', 'Post is created');
    }
    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);

        $post->delete();

        return redirect()->route('admin.posts')
            ->with('success', 'Post is deleted');
    }

    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);

        SEOMeta::setTitle('Edit ' . $post->title);

        return view('blog::admin.edit', [
            'blogPost' => $post
        ]);
    }

    public function update(Request $request, $id)
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

        return redirect()->route('admin.posts')
            ->with('success', 'Post is saved');
    }

    public function show()
    {
        SEOMeta::setTitle('New post');
        return view('blog::admin.new');
    }
}
