<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_comfirmation;

    protected $rules = [
        'name' => ['required'],
        'email' => ['required', 'unique:users'],
        'password' => ['required', 'min:8'],
        'password_comfirmation' => ['required_with:password', 'same:password', 'min:8']
    ];

    public function register()
    {
         $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user, true);

        event(new Registered($user));
        
        return redirect()->route('tasks.show');

    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
