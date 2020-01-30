@extends('admin.pages.master-admin')

@section('content')
<div class="content container">
    <div class="page">
        <h1 class="page-title">Profile</h1>
        @if(session()->has('success'))
        <span class="success_message">{{ session()->get('success') }}</span>
        @endif
        <form action="/admin/profile/{{ $user->id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" class="big-textbox" value="{{old('name', $user->name)}}">
            @error('name')
            <span class="error_message">{{ $message }}</span>
            @enderror
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email" class="big-textbox"
                value="{{old('email', $user->email)}}">
            @error('email')
            <span class="error_message">{{ $message }}</span>
            @enderror
            <button class="save-btn" type="submit">Save</button>
        </form>
    </div>
</div>

@endsection
