@extends('core::layouts.master-admin')

@section('content')

<div class="content container">
    <div class="page">
        <h1 class="page-title">New image</h1>
        <form method="POST" action="/admin/imagegallery" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Title" class="big-textbox" id="title"
                value="{{ old('title') }}">
            @error('title')
            <span class="error_message">{{ $message }}</span>
            @enderror
            <label for="title">Image</label>
            <div class="file-upload">
                <div class="file-select">
                    <div class="file-select-button" id="fileName">Choose File</div>
                    <div class="file-select-name" id="noFile">No file chosen...</div>
                    <input type="file" name="image" id="chooseFile" accept="image/*">
                </div>
            </div>
            @error('image')
            <span class="error_message">{{ $message }}</span>
            @enderror

            <button class="save-btn" type="submit">Save</button>
        </form>
    </div>
</div>

@endsection
