@extends('admin.pages.master-admin')

@section('title', 'Edit Page '.$page->title)

@section('content')

<div class="content container">
    <div class="page">
        <h1 class="page-title">Edit {{$page->title}}</h1>
        <form action="/page/update/{{ $page->id }}" method="post"">
            <label for=" title">Title</label>
            <input type="text" name="title" placeholder="Title" class="big-textbox" id="title"
                value="{{old('title', $page->title)}}">
            @error('title')
            <span class="error_message">{{ $message }}</span>
            @enderror
            <label for="content">Content</label>
            <textarea id="editor" name="content">{{old('content', base64_decode($page->content))}}</textarea>
            @error('content')
            <span class="error_message">{{ $message }}</span>
            @enderror
            {{ csrf_field() }}
            <button class="save-btn" type="submit">Save</button>
        </form>
    </div>
</div>

@endsection
