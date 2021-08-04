<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required']
    ];

    public function authenticate()
    {

        $request = $this->validate();
        

        if( Auth::attempt( $request, $this->remember) ) {         
            return redirect()->intended(route('tasks.show'));
        }
        else {
            $this->addError('credentials', trans('auth.failed'));
            return;
        }

    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
