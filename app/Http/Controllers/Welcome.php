<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class Welcome extends Controller
{
    public function __invoke()
    {
        $data['latest_posts'] = Post::latest()->take(3)->get();
        return view('welcome', $data);
    }
}
