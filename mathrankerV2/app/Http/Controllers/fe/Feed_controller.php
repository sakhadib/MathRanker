<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post as posts;
use App\Models\Post_Tag;
use App\Models\Vote as Votes;
use App\Models\Comment as Comments;
use Illuminate\Pagination\Paginator;

class Feed_controller extends Controller
{
    public function index()
    {
        $posts = posts::orderBy('created_at', 'desc')->paginate(15);
        // Assuming you want 10 posts per page, you can adjust the number as needed
        
        // Fetch additional information for each post
        $modifiedPosts = [];
        foreach ($posts as $post) {
            $post->content = substr($post->content, 0, 300);
            $tags = Post_Tag::where('post_id', $post->id)->pluck('tag_name')->toArray();
            $upVotes = Votes::where('post_id', $post->id)->where('vote', 1)->count();
            $downVotes = Votes::where('post_id', $post->id)->where('vote', 0)->count();
            $commentCount = Comments::where('post_id', $post->id)->count();

            $modifiedPost = (object) [
                'post' => $post,
                'tags' => $tags,
                'upVotes' => $upVotes,
                'downVotes' => $downVotes,
                'commentCount' => $commentCount
            ];

            $modifiedPosts[] = $modifiedPost;
        }

        // Convert modified posts array to paginator object
        $modifiedPostsPaginator = new Paginator($modifiedPosts, 15);

        return view('fe/Fourm', ['modifiedPosts' => $modifiedPostsPaginator]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $posts = posts::where('title', 'like', "%$search%")->orderBy('created_at', 'desc')->paginate(15);
        // Assuming you want 10 posts per page, you can adjust the number as needed
        
        // Fetch additional information for each post
        $modifiedPosts = [];
        foreach ($posts as $post) {
            $post->content = substr($post->content, 0, 300);
            $tags = Post_Tag::where('post_id', $post->id)->pluck('tag_name')->toArray();
            $upVotes = Votes::where('post_id', $post->id)->where('vote', 1)->count();
            $downVotes = Votes::where('post_id', $post->id)->where('vote', 0)->count();
            $commentCount = Comments::where('post_id', $post->id)->count();

            $modifiedPost = (object) [
                'post' => $post,
                'tags' => $tags,
                'upVotes' => $upVotes,
                'downVotes' => $downVotes,
                'commentCount' => $commentCount
            ];

            $modifiedPosts[] = $modifiedPost;
        }

        // Convert modified posts array to paginator object
        $modifiedPostsPaginator = new Paginator($modifiedPosts, 15);

        return view('fe/Fourm', ['modifiedPosts' => $modifiedPostsPaginator]);
    }
}
