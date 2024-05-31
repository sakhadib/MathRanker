<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\posts;
use App\Models\Post_Tag;
use App\Models\Votes;
use App\Models\Comments;
use Illuminate\Pagination\Paginator;
class feed_controller extends Controller
{
    // public function index()
    // {
    //     $posts = posts::orderBy('created_at', 'desc')->paginate(1);
    //     foreach($posts as $item){
    //         $item->content = substr($item->content, 0, 300);
    //         $tags = Post_Tag::where('post_id', $item->id)->pluck('tag_name')->toArray();
    //         $upVotes = Votes::where('post_id', $item->id)->where('vote', 1)->count();
    //         $downVotes = Votes::where('post_id', $item->id)->where('vote', 0)->count();
    //         $commentCount = Comments::where('post_id', $item->id)->count();

    //         $modifiedPost = (object) [
    //             'post' => $item,
    //             'tags' => $tags,
    //             'upVotes' => $upVotes,
    //             'downVotes' => $downVotes,
    //             'commentCount' => $commentCount
    //         ];

    //         $modifiedPosts[] = $modifiedPost;
    //     }
    //     return view('fe/Fourm', ['modifiedPosts' => $modifiedPosts]);
    // }

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
}
