@extends('admin.pages.master-admin')

@section('title', 'Posts')

@section('content')
<div class="content container">
    <div class="posts">
        <h1 class="page-title float-left"><a href="/">Posts</a></h1>
        <a href="/admin/posts/new"><i class="fa fa-plus float-right"></i></a>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th class="last">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td><a href="{{getFullUrl($post->id)}}">{{$post->title}}</a></td>
                    <td>
                        <div class="button-actions">
                            <a href="/post/edit/{{$post->id}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="/posts/delete/{{$post->id}}" class="delete-button">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
