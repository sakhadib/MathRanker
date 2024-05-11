@extends('fe.layouts.main')
@section('main-sec')
    <!-- Main Content -->
        <div class="vh-10"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="display-5 l">{{$post->title}}</h3>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-muted fs-5">Posted on {{ $post->created_at->format('d F, Y') }} by <span class="l">{{$post->uname}}</span></p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-end fs-5">
                                    Tags:
                                        @foreach ($tags as $tag)
                                            <span class="badge bg-secondary">{{$tag}}</span>
                                        @endforeach
                                    {{-- @php
                                        print_r($tags);
                                    @endphp --}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p class="math display s-content">
                        {{ $post->content }}
                    </p>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-auto">
                                <h2 class="display-5">
                                    <a href="/post/{{$post->id}}/up"><i class="uil uil-thumbs-up"></i></a> {{$upVotes}}
                                </h2>
                            </div>
                            <div class="col-auto">
                                <h2 class="display-5">
                                    <a href="/post/{{$post->id}}/down"><i class="uil uil-thumbs-down"></i></a> {{$downVotes}}
                                </h2>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <h4 class="display-6">Comments</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{url('/')}}/comment/submit" method="POST">
                        @csrf
                        <input type="text" name="post_id" value="{{$post->id}}" readonly hidden>
                        <div class="mb-3">
                            <textarea name="comment" placeholder="Write a comment. You can use LATEX notation in the comment..." class="form-control post-content-white p-4" id="typed-math" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-d mb-5"><i class="uil uil-message"></i> Submit</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="card  bs mb-4">
                        <h4 class="card-header">Comment Preview</h4>
                        <div class="card-body">
                            <p class="text-muted fs-6">Comment on {{date('d F, Y')}} by <span class="l">{{session('uname')}}</span></p>
                            <hr>
                            <p class="card-text s-content math display" id="math-preview"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @foreach ($Comments as $item)
                        <div class="card  bs mb-4">
                            <div class="card-body">
                                <h5 class="card-title display-6">{{$item->uname}}</h5>
                                <p class="text-muted fs-6">Commented on {{ $item->created_at->format('d F, Y') }}
                                    @if($item->updated_at != $item->created_at)
                                        (edited on {{ $item->updated_at->format('d F, Y') }})
                                    @endif
                                </p>
                                <hr>
                                <p class="card-text s-content math display">{{$item->content}}</p>
                                @if($item->uname == session('uname'))
                                <div class="df jcfe">
                                    <a href="/comment/{{$item->id}}/delete" class="btn btn-danger"><i class="uil uil-trash-alt"></i> Delete</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    <!-- End Main Content -->

    <div class="vh-30"></div>

<!-- Add your Custom Styles here -->
<style>
    .s-content{
        font-size: 1.2rem;
        text-align: justify;
    }
    
</style>

<style>
    .post-content-white {
        background-color: rgb(234, 234, 234);
        border-radius: 10px;
    }

    .post-content-white:focus {
        background-color: rgb(234, 234, 234);
        border-radius: 10px;
    }

    .post-content-dark {
        background-color: rgb(46, 52, 54);
        color: white;
        border-radius: 10px;
    }
    .post-content-dark:focus {
        background-color: rgb(46, 52, 54);
        color: white;
        border-radius: 10px;
    }
</style>

<script>
    // Function to update MathJax rendering and display line breaks
    function updateMathPreview() {
        // Get references to the textarea and the preview element
        const typedMath = document.getElementById('typed-math');
        const mathPreview = document.getElementById('math-preview');

        // Replace newline characters with HTML line break elements
        const contentWithLineBreaks = typedMath.value.replace(/\n/g, '<br>');

        // Update the content of the preview element with the content of the textarea
        mathPreview.innerHTML = contentWithLineBreaks;

        // Update MathJax rendering
        MathJax.texReset();
        MathJax.typesetClear();
        MathJax.typesetPromise([mathPreview]);
    }

    // Call the function when the document is fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        updateMathPreview();
    });

    // Add event listener to the textarea for input event
    document.getElementById('typed-math').addEventListener('input', updateMathPreview);
</script>

@endsection