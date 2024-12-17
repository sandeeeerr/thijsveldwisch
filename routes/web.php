<?php

use App\Livewire\Home;
use App\Livewire\information\Index as InformationIndex;
use App\Livewire\Contact\Index as ContactIndex;
use App\Livewire\Post\Show as PostShow;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', Home::class)->name('home');
Route::get('/article/{post:slug}', PostShow::class)->name('post.show');

Route::get('/information', InformationIndex::class)->name('information');
Route::get('/contact', ContactIndex::class)->name('contact');

Route::get('/storage/{path}', function ($path) {
    return Storage::disk('public')->response($path);
})->where('path', '.*');
