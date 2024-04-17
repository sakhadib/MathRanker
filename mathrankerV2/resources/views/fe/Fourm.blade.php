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
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="">
                                <a href="/newpost" style="width: 100%" class="btn btn-l">
                                    <i class="uil uil-edit-alt"></i> Create Post
                                </a>
                            </h5>
                        </div>
                        
                    </div>
                    <hr>
                    @foreach ($modifiedPosts as $item)
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="display-6 math">{{$item->post->title}}</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="text-muted fs-5">Posted on {{ $item->post->created_at->format('d F, Y') }} by <span class="l">{{$item->post->uname}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title mb-2 math" id="post-title"></h1>
                                    <div class="container-fluid">
                                        <div class="row mb-2">
                                            <div class="col-md-12">
                                                <p class="lead mb-3 text-end" id="tag-view">
                                                @foreach ($item->tags as $tag)
                                                    <span class="badge bg-l">{{$tag}}</span>
                                                @endforeach
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="math mt-2" style="font-family: 'Times New Roman', Times, serif; font-size:24px">
                                                    {{ $item->post->content }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="df jcfs">
                                                    <a href="/post/{{$item->post->id}}" class="btn btn-l"><i class="uil uil-angle-double-right"></i> Read More</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-auto">
                                                <p class="lead text-end"><i class="uil uil-thumbs-up"></i> {{$item->upVotes}}</p>
                                            </div>
                                            <div class="col-auto">
                                                <p class="lead text-end"><i class="uil uil-thumbs-down"></i> {{$item->downVotes}}</p>
                                            </div>
                                            <div class="col-auto">
                                                <p class="lead"><i class="uil uil-comment-alt-dots"></i> {{$item->commentCount}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
            </div>

        </div>
    </div>

<!-- Add your Custom Styles here -->
@endsection