@extends('fe.layouts.main')
@section('main-sec')
@php
    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $nextPage = $currentPage + 1;
    $prevPage = $currentPage - 1;
    if($prevPage < 1){
        $prevPage = 1;
    }
@endphp

<div class="vh-10"></div>
<div class="container">
    <div class="row mb-5">
        <div class="col-md-10">
            <form action="/feed" class="df" method="POST">
                @csrf
                <input type="text" name="search" id="search" class="form-control" placeholder="Search for posts">
                <button type="submit" class="btn btn-l">Search</button>
            </form>
        </div>
        <div class="col-md-2 df jcc aic">
            <a href="/newpost" class="btn btn-d-outline"><i class="uil uil-pen"></i> Create Post</a>
        </div>
    </div>
    <div class="row">
        @foreach ($modifiedPosts as $item)
        <div class="col-md-4 mt-2 mb-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="fs-3 math">{{$item->post->title}}</h4>
                    <p class="text-muted fs-6">{{ $item->post->created_at->format('d F, Y') }} by <a href="/profile/{{$item->post->uname}}">{{$item->post->uname}}</a></p>
                </div>
                <div class="card-body">
                    <p class="fs-5">
                        {{ $item->post->content }}
                    </p>
                </div>
                <div class="card-footer">
                    <div class="df jcfs">
                        <a href="/post/{{$item->post->id}}" class="link-l"><i class="uil uil-angle-double-right"></i> Read More</a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-auto">
            <div class="df jcfe">
                <a href="/feed/{{'?page='. $prevPage}}" class="btn btn-l"><i class="uil uil-angle-double-left"></i> Previous Page</a>
            </div>
        </div>
        <div class="col-auto">
            <div class="df jcfe">
                <a href="/feed/{{'?page='. $nextPage}}" class="btn btn-l"><i class="uil uil-angle-double-right"></i> Next Page</a>
            </div>
        </div>
    </div>
</div>


<!-- Add your Custom Styles here -->
@endsection