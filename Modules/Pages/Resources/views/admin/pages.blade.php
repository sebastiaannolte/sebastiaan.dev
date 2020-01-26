@extends('admin.pages.master-admin')

@section('title', 'Pages')

@section('content')
<div class="content container">
    <div class="posts">
        <h1 class="page-title">Pages</h1>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th class="last">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                <tr>
                    <td><a href="/{{strtolower($page->title)}}">{{$page->title}}</a></td>
                    <td>
                        <div class="button-actions">
                            <a href="/page/edit/{{$page->id}}"><i class="fa fa-edit"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
