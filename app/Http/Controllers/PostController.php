<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $data['latest_posts'] = Post::latest()->published()->paginate(9);
        return view('post.index', $data);
    }
    
    public function show(Post $post)
    {
        if(!$post->is_published)
            return abort(403);
        
        $data['post'] = $post;
        return view('post.show', $data);
    }
}
