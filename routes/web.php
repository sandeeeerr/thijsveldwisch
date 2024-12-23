<?php

use App\Livewire\Home;
use App\Livewire\Information\Index as InformationIndex;
use App\Livewire\Post\Show as PostShow;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', Home::class)->name('home');
Route::get('/work/{post:slug}', PostShow::class)->name('post.show');

Route::get('/information', InformationIndex::class)->name('information');

Route::get('/storage/{path}', function ($path) {
    return Storage::disk('public')->response($path);
})->where('path', '.*');
