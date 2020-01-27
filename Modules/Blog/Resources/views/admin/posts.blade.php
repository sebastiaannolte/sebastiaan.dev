@extends('admin.pages.master-admin')

@section('title', 'Posts')

@section('content')
<div class="content container">
    <div class="posts">
        <h1 class="page-title float-left"><a href="/">Posts</a></h1>
        <a href="/admin/post/new"><i class="fa fa-plus float-right"></i></a>
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
                            <a href="/admin/post/edit/{{$post->id}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form method="POST" action="/admin/post/{{$post->id}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <div class="form-group">
                                    <input type="submit" class="delete-button" value="Delete">
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
