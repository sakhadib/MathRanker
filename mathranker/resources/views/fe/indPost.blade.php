@extends('fe.layouts.main')
@section('main-sec')
    <div class="vh-10"></div>
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-6 p-4 vh-100">
                <form action="{{url('/')}}/post" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <textarea style="font-size: 2.5rem" rows="1" type="text" name="title" id="title" placeholder="Title" class="form-control" required></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <textarea style="font-size: 24px; font-family: 'Times New Roman', Times, serif;" name="content" id="typed-math" required rows="15" placeholder="Start Writing Here..." class="form-control post-content p-4"></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <input style="font-size: 24px;" name="tag" id="tags" placeholder="separate tags with comma" class="form-control" required>
                    </div>
                    <button type="submit" style="width: 100%;" class="btn btn-l">Post</button>
                </form>
            </div>
            <div class="col-md-6 p-4">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h4>LaTeX Helper</h4>
                    <table class="table table-striped mt-3">
                        <tr>
                            <td>inline math</td>
                            <td><code>\( ... \)</code></td>
                        </tr>
                        <tr>
                            <td>display math</td>
                            <td><code>\[ ... \]</code></td>
                        </tr>
                    </table>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Post Preview <span class="badge bg-secondary">beta</span></h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title mb-2 math" id="post-title"></h1>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="lead mb-3">Post By <code>{{session('uname')}}</code> On <code>{{ date('Y-m-d') }} </code></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="lead mb-3 text-end" id="tag-view">Tags: </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p class="math mt-2" style="font-family: 'Times New Roman', Times, serif; font-size:24px" id="math-preview">
                            
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    

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
    function updatePostTitle() {
        const title = document.getElementById('title');
        const postTitle = document.getElementById('post-title');

        postTitle.innerHTML = title.value;

        MathJax.texReset();
        MathJax.typesetClear();
        MathJax.typesetPromise([postTitle]);
    }

    document.addEventListener("DOMContentLoaded", function() {
        updatePostTitle();
    });

    document.getElementById('title').addEventListener('input', updatePostTitle);
</script>

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

<script>
    // Function to update and display tags in real-time
function updateTagsPreview() {
    // Get the input field for tags and the element where tags will be displayed
    const tagsInput = document.getElementById('tags');
    const tagView = document.getElementById('tag-view');

    // Clear the current content of the tag view
    tagView.innerHTML = '';

    // Split the input value into an array of tags separated by commas
    const tagsArray = tagsInput.value.split(',');

    // Iterate through the tags array and add each tag as a Bootstrap badge
    tagsArray.forEach(tag => {
        if (tag.trim() !== '') {
            const badge = document.createElement('span');
            badge.className = 'badge bg-l me-1';
            badge.textContent = tag.trim();
            tagView.appendChild(badge);
        }
    });
}

// Function to handle form submission and validate tags input
function handleSubmit(event) {
    // Get the input field for tags
    const tagsInput = document.getElementById('tags');

    // Check if tags input field is empty
    if (tagsInput.value.trim() === '') {
        // Prevent form submission
        event.preventDefault();

        // Show custom error message
        alert('Your post must have at least 1 tag.');
    }
}

// Call the function to update tags preview when the document is fully loaded
document.addEventListener("DOMContentLoaded", function() {
    updateTagsPreview();
});

// Add event listener to the input field for input event
document.getElementById('tags').addEventListener('input', updateTagsPreview);

// Add event listener to the form for form submission
document.querySelector('form').addEventListener('submit', handleSubmit);

</script>



@endsection
