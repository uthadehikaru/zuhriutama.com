<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\User;
use App\Notifications\NewPost;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        if (! $post->is_published) {
            return;
        }

        $users = User::verified()->subscriber()->get();
        foreach ($users as $user) {
            $user->notify(new NewPost($post));
        }
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
