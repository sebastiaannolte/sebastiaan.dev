@extends('core::layouts.master-admin')

@section('content')
<div class="content container">
    <div class="projects">
        <div class="page-title-block">
            <h1 class="page-title float-left"><a href="/projects">Projects</a></h1>
            <a class="new-button" href="/admin/project/create"><button class="btn btn--action">Add <i
                        class="fa fa-plus"></button></i></a>
        </div>
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
                            <a href="/admin/project/{{$project->id}}/edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            </a>
                            <form method="POST" action="/admin/project/{{$project->id}}">
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
        {{$projects->links('core::pagination.admin')}}
    </div>
</div>

@endsection
