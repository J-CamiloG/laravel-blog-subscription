<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            if (!Auth::user()->is_active) {
                Auth::logout();
                session()->flash('error', 'Tu cuenta está inactiva. Por favor, espera la activación por un administrador.');
                return;
            }

            session()->regenerate();
            return redirect()->intended('/');
        }

        $this->addError('email', 'Las credenciales proporcionadas no son correctas.');
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.app');
    }
}