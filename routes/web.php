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

Route::get('/', 'PageController@front');

Route::resources([
    'posts' => 'PostsController'
]);

Route::prefix('admin')
    ->middleware('auth')
    ->group(function ()
{
    Route::resources([
        'posts' => 'Admin\PostsController',
        'users' => 'Admin\UsersController'
    ]);
});


Auth::routes();
