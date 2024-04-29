<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('view')
                ->url(fn (Post $record): string => route('post.show', ['post' => $record->slug, 'preview' => true]))
                ->icon('heroicon-o-eye')
                ->color('info')
                ->openUrlInNewTab(),
            Actions\DeleteAction::make(),
        ];
    }
}
