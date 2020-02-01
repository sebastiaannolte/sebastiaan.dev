@extends('core::layouts.master-admin')

@section('content')
<div class="content container">
    <div class="image-gallery">
        <div class="page-title-block">
            <h1 class="page-title">Image gallery</h1>
            <a class="new-button" href="/admin/imagegallery/create"><button class="btn btn--action">Add <i
                        class="fa fa-plus"></button></i></a>
        </div>
        @if($images->count())
        @foreach($images as $image)
        <div class="image-container">
            <div class="image-title">
                <div class="image-information">
                    <div class='text-center img-title'>
                        <small>{{ $image->title }}</small>
                    </div>
                    <form method="POST" action="/admin/imagegallery/{{$image->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="delete-button"><i class="fa fa-trash"></i></button>
                    </form>
                </div>

            </div>
            <a class="image-thumbnail" href="/img/{{ $image->image }}" target="_blanc">
                <img class="image-gallery-img" alt="" src="/img/{{ $image->image }}" />
            </a>
        </div>
        @endforeach
        @endif


    </div> <!-- list-group / end -->
    {{$images->links('core::pagination.admin')}}
</div> <!-- row / end -->
@endsection
