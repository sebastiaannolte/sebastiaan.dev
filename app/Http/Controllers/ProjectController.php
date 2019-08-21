<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Project;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Projects');
        SEOMeta::setDescription('View all the projects made by Sebastiaan Nolte');
        $projects = Project::orderby('created_at', 'desc')->paginate(3);
        return view('pages.projects', [
            'projects' => $projects
        ]);
    }

    public function adminIndex()
    {
        $projects = Project::all()->sortByDesc("updated_at");
        return view('admin.project.projects', [
            'projects' => $projects
        ]);
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $blogPost = BlogPost::all()->sortByDesc("id");

        return view('admin.project.edit', [
            'project' => $project, 'blogPost' => $blogPost
        ]);
    }

    public function new()
    {
        $blogPosts = BlogPost::all()->sortByDesc("id");
        return view('admin.project.new', [
            'blogPost' => $blogPosts
        ]);
    }

    public function create(Request $request)
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

        return redirect('/project/projects');
    }

    public function save(Request $request, $id)
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

        return redirect('/project/projects');
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect('/project/projects');
    }
}
