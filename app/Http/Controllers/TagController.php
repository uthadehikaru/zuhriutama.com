<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Spatie\Tags\Tag;

class TagController extends Controller
{
    public function show($id)
    {
        $tag = Tag::findFromString($id);
        if (! $tag) {
            abort(404);
        }

        $posts = Post::withAnyTags([$id])->latest()->published()->paginate(9);

        $data['tag'] = $tag;
        $data['latest_posts'] = $posts;

        return view('tag.show', $data);
    }
}
