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

// Public routes.
Route::get('/', 'PageController@front');
Route::get('app', 'PageController@singlePage');
Route::get('oauth/{service}/callback', 'ServicesController@callback')->name('service.callback');
Route::resources([
    'posts' => 'PostsController'
]);

// Admin/Manager routes.
Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function ()
{
    Route::resources([
        'accounts' => 'Admin\AccountsController',
        'posts' => 'Admin\PostsController',
        'users' => 'Admin\UsersController'
    ]);
});

// Auth routing.
Auth::routes();
Route::get('home', 'Admin\PageController@home')->middleware('auth')->name('home');
