@extends('core::layouts.master-admin')

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
                            <a href="/admin/page/{{$page->id}}/edit"><i class="fa fa-edit"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$pages->links('core::pagination.admin')}}
    </div>
</div>

@endsection
