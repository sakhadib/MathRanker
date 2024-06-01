<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attempts;
use App\Models\Post;
use App\Models\Post_Tag;
use App\Models\Comment;
use App\Models\Vote;



use Illuminate\Http\JsonResponse;

class Post_controller extends Controller
{
    public function index($post_id)
    {
        $post = post::where('id', $post_id)->first();
        $tags = Post_Tag::where('post_id', $post_id)->pluck('tag_name')->toArray();
        $upVotes = Vote::where('post_id', $post_id)->where('vote', 1)->count();
        $downVotes = Vote::where('post_id', $post_id)->where('vote', 0)->count();
        $Comments = Comment::where('post_id', $post_id)->orderBy('created_at', 'desc')->get();
        // die($Comments);
        return view(
                    'fe/post', 
                    [
                        'post' => $post, 
                        'tags' => $tags,
                        'upVotes' => $upVotes,
                        'downVotes' => $downVotes,
                        'Comments' => $Comments
                    ]
                );
    }

    public function create()
    {
        if(session('isLoggedIn')){
            return view('fe/indPost');
        }
        else{
            return redirect('login');
        }
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tag' => 'required'
        ]);

        $title = $request->input('title');
        $content = $request->input('content');
        $tags = $request->input('tag');
        $uname = session('uname');

        $tag_array = explode(',', $tags);
        $tag_array = array_map('trim', $tag_array);

        $post = new Post;
        $post->title = $title;
        $post->content = $content;
        $post->uname = $uname;
        $post->save();

        $post_id = $post->id;

        foreach($tag_array as $tag){
            $post_tag = new Post_Tag;
            $post_tag->tag_name = $tag;
            $post_tag->post_id = $post_id;
            $post_tag->save();
        }
        return redirect('post/' . $post_id);
    }


    public function upvote($post_id)
    {
        $uname = session('uname');
        $vote = Vote::where('post_id', $post_id)->where('uname', $uname)->first();
        if($vote){
            if($vote->vote == 0){
                $vote->vote = 1;
                $vote->save();
            }
        }
        else{
            $vote = new Vote;
            $vote->post_id = $post_id;
            $vote->uname = $uname;
            $vote->vote = 1;
            $vote->save();
        }
        return redirect('post/' . $post_id);
    }

    public function downvote($post_id)
    {
        $uname = session('uname');
        $vote = Vote::where('post_id', $post_id)->where('uname', $uname)->first();
        if($vote){
            if($vote->vote == 1){
                $vote->vote = 0;
                $vote->save();
            }
        }
        else{
            $vote = new Vote;
            $vote->post_id = $post_id;
            $vote->uname = $uname;
            $vote->vote = 0;
            $vote->save();
        }
        return redirect('post/' . $post_id);
    }

    public function commentStore(Request $request)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $comm = (string) $request->input('comment');
        $post_id = $request->input('post_id');
        $uname = session('uname');

        $comment = new Comment;
        $comment->post_id = $post_id;
        $comment->uname = $uname;
        $comment->content = $comm;
        $comment->save();

        return redirect('post/' . $post_id);
    }

    public function commentDelete($comment_id)
    {
        $comment = Comment::where('id', $comment_id)->first();
        $post_id = $comment->post_id;
        $comment->delete();
        return redirect('post/' . $post_id);
    }

}
