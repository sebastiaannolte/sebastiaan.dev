@extends('admin.pages.master-admin')

@section('title', 'New Post')

@section('content')

<div class="content container">
    <div class="page">
        <h1 class="page-title">New Post</h1>
        <form action="/post/store" method="post">
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Title" class="big-textbox" id="title"
                value="{{ old('title') }}">
            @error('title')
            <span class="error_message">{{ $message }}</span>
            @enderror
            <label for="permalink">Permalink</label>
            <input type="text" name="permalink" placeholder="Permalink" class="big-textbox" id="slug"
                value="{{ old('permalink') }}">
            @error('permalink')
            <span class="error_message">{{ $message }}</span>
            @enderror
            <label for="content">Content</label>
            <textarea id="editor" name="content">{{ old('content') }}</textarea>
            @error('content')
            <span class="error_message">{{ $message }}</span>
            @enderror
            {{ csrf_field() }}
            <button class="save-btn" type="submit">Save</button>
        </form>
    </div>
</div>

@endsection
