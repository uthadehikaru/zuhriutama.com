<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class SubscribeForm extends Component
{

    public $message;
    public $name;
    public $email;

    public function mount()
    {
        if(request()->get('verified')){
            $this->message = "Email anda telah terverifikasi, kami akan mengirimkan notifikasi via email untuk artikel terbaru kami";
        }
    }

    public function submit()
    {
        $validated = $this->validate([ 
            'name' => 'required|min:3',
            'email' => 'required|email',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make(Str::random()),
            'level' => 2,
        ]);
        event(new Registered($user));
        Auth::login($user);
        $this->message = "data anda telah tersimpan. silahkan cek email anda untuk verifikasi.";
        $this->name = "";
        $this->email = "";
    }

    public function render()
    {
        return view('livewire.subscribe-form');
    }
}
