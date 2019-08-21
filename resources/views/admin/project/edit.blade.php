@extends('admin.pages.master-admin')

@section('title', 'Edit Project '.$project->title)

@section('content')

<div class="content container">
    <div class="page">
        <h1 class="page-title">Edit {{$project->title}}</h1>
        <form action="/project/save/{{ $project->id }}" method="post">
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Title" class="big-textbox" id="title"
                value="{{old('title', $project->title)}}">
            @error('title')
            <span class="error_message">{{ $message }}</span>
            @enderror
            <label for="blog_post">Blog Post</label>
            <select name="blog_post_id" class="big-dropdown">
                @foreach($blogPost as $post)
                {{-- Select the right option from the dropdown --}}
                <option value="{{ $post->id }}" {{$project->blog_post_id == $post->id  ? 'selected' : ''}}>
                    {{ $post->title}}</option>
                @endforeach
            </select>
            <label for="github_url">Github URL</label>
            <input type="text" name="github_link" placeholder="Github Link" class="big-textbox"
                value="{{old('github_link', $project->github_link)}}">
            @error('github_link')
            <span class="error_message">{{ $message }}</span>
            @enderror
            <label for="image">Image Url</label>
            <input type="text" name="image" placeholder="Image Url" class="big-textbox"
                value="{{old('image', $project->image)}}">
            @error('image')
            <span class="error_message">{{ $message }}</span>
            @enderror
            <label for="content">Content</label>
            <textarea id="editor" name="content">{{old('content', base64_decode($project->content))}}</textarea>
            @error('content')
            <span class="error_message">{{ $message }}</span>
            @enderror
            {{ csrf_field() }}
            <button class="save-btn" type="submit">Save</button>
        </form>
    </div>
</div>

@endsection
