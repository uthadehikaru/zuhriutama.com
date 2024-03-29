<?php

namespace App\Http\Controllers;

use App\Models\Post;

class Welcome extends Controller
{
    public function __invoke()
    {
        $data['latest_posts'] = Post::latest()->published()->take(3)->get();

        return view('welcome', $data);
    }
}
