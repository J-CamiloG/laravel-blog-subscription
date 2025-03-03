<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;
use App\Livewire\Posts\PostList;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', PostList::class)->name('home');


Route::view('/login', 'auth.login')->name('login');
Route::get('/register', Register::class)->name('register');
