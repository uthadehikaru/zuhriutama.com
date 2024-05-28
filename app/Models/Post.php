<?php

namespace App\Models;

use App\Observers\PostObserver;
use App\Traits\MarkdownTrait;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Tags\HasTags;

#[ObservedBy([PostObserver::class])]
class Post extends Model implements Viewable
{
    use HasFactory;
    use HasTags;
    use InteractsWithViews;
    use MarkdownTrait;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeDraft($query)
    {
        return $query->where('is_published', false);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
