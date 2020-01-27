@extends('admin.pages.master-admin')

@section('title', 'Projects')

@section('content')
<div class="content container">
    <div class="projects">
        <h1 class="page-title float-left"><a href="/projects">Projects</a></h1>
        <a href="/admin/project/create"><i class="fa fa-plus float-right"></i></a>
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
                            <a href="{{route('project.edit', ['id', $project->id])}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form method="POST" action="/admin/project/{{$project->id}}">
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
