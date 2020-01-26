@extends('master')

@section('title', 'Sebastiaan.dev')

@section('content')
<div class="content container">
    <div class="posts">
        @foreach ($blogPosts as $blogPost)
        <div class="post">
            <h1 class="post-title">
                <a href="{{getFullUrl($blogPost->id)}}">{{$blogPost->title}} </a>
            </h1>
            <span class="post-info">{{$blogPost->created_at->diffForHumans()}} | {{readTime($blogPost->content)}}
            </span>
            {!!base64_decode($blogPost->content)!!}
        </div>

        @endforeach
    </div>
    <div class="pagination">
        {{$blogPosts->links('blog::pagination')}}
    </div>
</div>

@endsection
