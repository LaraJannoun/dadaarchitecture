<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['footer'])->namespace('App\Http\Controllers\Web')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::middleware(['footerV2'])->group(function () {
        Route::get('/projects', 'ProjectController@index')->name('projects');
        Route::get('/projects/{slug}', 'ProjectController@single')->name('project');
        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::get('/services', 'ServiceController@index')->name('services');
        Route::get('/contact', 'ContactController@index')->name('contact');
        Route::post('contact/submit', 'ContactController@submit')->name('contact.submit');
    });
});

