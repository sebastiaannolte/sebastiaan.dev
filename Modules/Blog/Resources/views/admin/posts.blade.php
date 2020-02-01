@extends('core::layouts.master-admin')

@section('content')
<div class="content container">
    <div class="posts">
        <div class="page-title-block">
            <h1 class="page-title float-left"><a href="/">Posts</a></h1>
            <a class="new-button" href="/admin/post/new"><i class="fa fa-plus float-right"></i></a>
        </div>
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
                            <a href="/admin/post/{{$post->id}}/edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form method="POST" action="/admin/post/{{$post->id}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <div class="form-group">
                                    <button class="delete-button"><i class="fa fa-trash"></i></button>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$posts->links('core::pagination.admin')}}
    </div>
</div>

@endsection
