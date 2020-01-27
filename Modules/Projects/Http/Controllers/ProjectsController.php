<?php

namespace Modules\Projects\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Artesaos\SEOTools\Facades\SEOMeta;
use Modules\Projects\Entities\Project;
use Modules\Blog\Entities\BlogPost;

class ProjectsController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Projects');
        SEOMeta::setDescription('View all the projects made by Sebastiaan Nolte');
        $projects = Project::with('blogPost')->orderby('created_at', 'desc')->paginate(3);
        return view('projects::index', [
            'projects' => $projects
        ]);
    }

    public function projects()
    {
        $projects = Project::all()->sortByDesc("updated_at");
        return view('projects::admin.projects', [
            'projects' => $projects
        ]);
    }

    public function edit($id)
    {
        dd($id);
        $project = Project::findOrFail($id);
        $blogPost = BlogPost::all()->sortByDesc("id");

        return view('projects::admin.edit', [
            'project' => $project, 'blogPost' => $blogPost
        ]);
    }

    public function create()
    {
        $blogPosts = BlogPost::all()->sortByDesc("id");
        return view('projects::admin.new', [
            'blogPost' => $blogPosts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:30|unique:projects,title',
            'github_link' => 'required',
            'image' => 'required',
            'content' => 'required',
        ]);
        $project = new Project();
        $project->title = $request->title;
        $project->blog_post_id = $request->blog_post_id;
        $project->github_link = $request->github_link;
        $project->image = $request->image;
        $project->content = base64_encode($request->content);

        $project->save();

        return redirect('/admin/projects');
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|unique:projects,title,' . $project->id,
            'github_link' => 'required',
            'image' => 'required',
            'content' => 'required',
        ]);

        $project->title = $request->title;
        $project->blog_post_id = $request->blog_post_id;
        $project->github_link = $request->github_link;
        $project->image = $request->image;
        $project->content = base64_encode($request->content);

        $project->save();

        return redirect('/admin/projects');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect('/admin/projects');
    }
}
