<?php

namespace App\Livewire;

use App\Models\Comment;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * @property Form $form
 */
class CommentForm extends Component implements HasForms
{
    use InteractsWithForms, WithPagination;

    public $post_id;

    public $message;

    public $parent_id = 0;

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
                    ->default(Auth::user()?->name)
                    ->placeholder('Nama anda')
                    ->required(),
                TextInput::make('email')
                    ->placeholder('Email anda yang aktif')
                    ->default(Auth::user()?->email)
                    ->email()
                    ->required(),
                Textarea::make('message')
                    ->placeholder('komentar anda')
                    ->required(),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $data['post_id'] = $this->post_id;
        if($this->parent_id)
            $data['parent_id'] = $this->parent_id;
        Comment::create($data);
        $this->message = 'Komentar anda telah tersimpan';
        $this->form->fill();
    }

    public function reply($parent_id)
    {
        $this->parent_id = $parent_id;
    }

    public function render()
    {
        $data['comments'] = Comment::published()->latest()->where('post_id', $this->post_id)
            ->whereNull('parent_id')->paginate();

        return view('livewire.comment-form', $data);
    }
}
