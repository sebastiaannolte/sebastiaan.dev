@extends('core::layouts.master-admin')

@section('content')
<div class="content container">
    <div class="post">
        <h1 class="post-title">
            {{$blogPost->title}}
        </h1>
        <span class="post-info">{{$blogPost->created_at->diffForHumans()}} | {{readTime($blogPost->content)}}</span>
        {!!base64_decode($blogPost->content)!!}
    </div>
    @include('blog::recent')
</div>

@endsection
