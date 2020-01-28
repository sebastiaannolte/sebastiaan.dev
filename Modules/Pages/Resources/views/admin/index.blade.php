@extends('admin.pages.master-admin')

@section('content')
<div class="content container">
    <div class="page">
        <h1 class="page-title">{{$page->title}}</h1>
        {!!base64_decode($page->content)!!}
    </div>
</div>

@endsection
