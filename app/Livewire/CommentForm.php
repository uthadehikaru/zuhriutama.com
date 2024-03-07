<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Livewire\WithPagination;

class CommentForm extends Component implements HasForms
{
    use WithPagination, InteractsWithForms;

    public $post_id;

    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                Textarea::make('message')
                    ->required(),
            ])
            ->statePath('data');
    }
    
    public function create(): void
    {
        dd($this->form->getState());
    }

    public function render()
    {
        $data['comments'] = Comment::published()->latest()->where('post_id',$this->post_id)
            ->whereNull('parent_id')->paginate();
        return view('livewire.comment-form', $data);
    }
}
