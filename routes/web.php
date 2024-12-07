<?php

use App\Livewire\Home;
use App\Livewire\Post\Show as PostShow;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', Home::class)->name('home');
Route::get('/article/{post:slug}', PostShow::class)->name('post.show');


Route::get('/storage/{path}', function ($path) {
    return Storage::disk('public')->response($path);
})->where('path', '.*');
