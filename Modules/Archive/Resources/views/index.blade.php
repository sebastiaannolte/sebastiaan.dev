@extends('master')

@section('title', 'Archive')

@section('content')
<div class="content container">
    <div class="page">
        <h1 class="page-title">Archive</h1>
        @foreach ($posts_by_date as $date => $posts)
        <h2>{{ $date }}</h2>
        <ul>
            @foreach ($posts as $post)
            <li>
                <p>{{$post->created_at->format('d M Y')}} - <a href="{{getFullUrl($post->id)}}">{{$post->title}}</a></p>
            </li>
            @endforeach
        </ul>
        @endforeach
    </div>
</div>

@endsection
