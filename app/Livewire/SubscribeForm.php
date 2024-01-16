<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class SubscribeForm extends Component
{

    public $name;
    public $email;

    public function submit()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make(Str::random()),
            'level' => 2,
        ]);
        $this->name = "";
        $this->email = "";
    }

    public function render()
    {
        return view('livewire.subscribe-form');
    }
}
