<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;
use App\Livewire\Posts\PostList;
use App\Livewire\Admin\UserManagement;



Route::get('/', PostList::class)->name('home');

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');


// Ruta para cerrar sesión
Route::post('/logout', function () {
    auth()->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/');
})->name('logout');


// Ruta administración
Route::middleware(['auth'])->group(function () {
    Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::get('/admin/users', UserManagement::class)->name('admin.users');
    });
});