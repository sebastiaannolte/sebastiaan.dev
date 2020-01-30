@extends('core::layouts.master-admin')

@section('content')
<div class="content container">
    <div class="page">
        <h1 class="page-title">Projects</h1>
        @foreach ($projects as $project)


        <div class="project">

            <h1><a href="{{$project->github_link}}">{{$project->title}}</a></h1>

            {{-- <a href="https://github.com/anishathalye/git-remote-dropbox"> --}}
            <img src="{{$project->image}}" alt="" style="width: 100%; max-width: 1520px; max-height: 100%;">
            {{-- </a> --}}

            <p>{!!base64_decode($project->content)!!}
            </p>
            <h2>Blog Post</h2>
            <ul>
                <li>
                    <a href="{{getFullUrl($project->blog_post_id)}}">{{$project->blogPost->title}}
                        <small class="small-date">
                            {{$project->created_at->format('d M Y')}}
                        </small>
                    </a>
                </li>
            </ul>



        </div>
        @endforeach
    </div>
    {{$projects->links('core::pagination.frontend')}}
</div>

@endsection
