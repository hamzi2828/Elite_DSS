<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ArticleController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('home.pages.index');
})->name('home');

Route::get('about-us', function () {
    return view('home.pages.about_us');
})->name('about.us');

Route::get('our-services', function () {
    return view('home.pages.services');
})->name('our.services');

Route::get('our-writers', function () {
    return view('home.pages.our_writers');
})->name('our.writers');

Route::get('samples', function () {
    return view('home.pages.samples');
})->name('samples');

Route::get('sampsubserviceles', function () {
    return view('home.pages.subservice');
})->name('subservice');

Route::get('free-topics', function () {
    return view('home.pages.free_topics');
})->name('free.topics');

Route::get('blogs', function () {
    return view('home.pages.blogs.index');
})->name('free.topics');

Route::get('contact-us', function () {
    return view('home.pages.contact_us');
})->name('contact.us');

/********************* Blogs routes *********************/
Route::get('blogs', function () {
    return view('home.pages.blogs_main');
})->name('blogs.index');

Route::get('blogs_planning', function () {
    return view('home.pages.blogs_planning');
})->name('blogs.planning');

Route::get('blogs_motivation', function () {
    return view('home.pages.blogs_motivation');
})->name('blogs.motivation');

Route::get('blogs_inspiration', function () {
    return view('home.pages.blogs_inspiration');
})->name('blogs.inspiration');

Route::get('blogs_college_addmissions', function () {
    return view('home.pages.college_admission');
})->name('blogs.college.addmissions');

/***************** Admin Routes *****************/
Route::prefix('admin') // Set the prefix to 'admin'
    ->middleware('role:admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

    Route::resource('authors', AuthorController::class);
    Route::resource('themes', ThemeController::class);
    Route::resource('articles', ArticleController::class);
    Route::post('articles/file-upload',['as' => 'articles.file-upload','uses' => 'ArticleController@file_upload']);
});