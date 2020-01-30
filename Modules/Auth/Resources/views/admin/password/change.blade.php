@extends('core::layouts.master-admin')

@section('content')
<div class="content container">
    <div class="page">
        <h1 class="page-title">Change Password</h1>
        <form action="/admin/password/change/{{ $user->id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <label for="new_password">Password</label>
            <input type="password" name="new_password" placeholder="New Password" class="big-textbox">
            @error('new_password')
            <span class="error_message">{{ $message }}</span>
            @enderror
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Confirm Password" class="big-textbox">
            @error('confirm_password')
            <span class="error_message">{{ $message }}</span>
            @enderror
            <button class="save-btn" type="submit">Save</button>
        </form>
    </div>
</div>

@endsection
