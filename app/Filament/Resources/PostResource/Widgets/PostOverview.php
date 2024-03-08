<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PostOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Posts', Post::count()),
            Stat::make('Comments', Comment::count()),
            Stat::make('Users', User::count()),
        ];
    }
}
