<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Posts\PostList;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', PostList::class)->name('home');


// Route::view('/login', 'auth.login')->name('login');
// Route::view('/register', 'auth.register')->name('register');
