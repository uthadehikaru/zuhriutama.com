<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'posted_at' => 'datetime',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published',true);
    }
}
