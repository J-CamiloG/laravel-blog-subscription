<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $birth_date = '';


    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'birth_date' => 'required|date',
    ];

    protected $messages = [
        'birth_date.before_or_equal' => 'Debes ser mayor de edad para registrarte.',
    ];


    public function rules()
    {
        return array_merge($this->rules, [
            'birth_date' => [
                'required',
                'date',
                'before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d')
            ],
        ]);
    }

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'birth_date' => $this->birth_date,
            'is_active' => false, // Estado inicial 
        ]);

        session()->flash('success', 'Registro exitoso. Tu cuenta será activada por un administrador.');
        
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layouts.app');
    }
}