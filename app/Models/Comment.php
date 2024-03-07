<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function parent():BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
