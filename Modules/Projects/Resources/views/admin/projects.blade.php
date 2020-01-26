@extends('admin.pages.master-admin')

@section('title', 'Projects')

@section('content')
<div class="content container">
    <div class="projects">
        <h1 class="page-title float-left"><a href="/projects">Projects</a></h1>
        <a href="/admin/project/new"><i class="fa fa-plus float-right"></i></a>
        </h1>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th class="last">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{$project->title}}</td>
                    <td>
                        <div class="button-actions">
                            <a href="/project/edit/{{$project->id}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="/project/delete/{{$project->id}}" class="delete-button">
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
