<?php

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

Route::get('/login', function () {
    return view('login');
});

Route::get('error', ["as" => "error", "uses" => "Controller@error"]);

Route::resources(["posts" => "PostsController"]);
Route::resources(["categories" => "CategoriesController"]);
Route::get('/favorites/add/{user_id}/{post_id}', ["as" => "favorites.store", "uses" => "FavoritesController@store"]);
Route::get('/favorites', ["as" => "favorites.index", "uses" => "FavoritesController@index"]);
Route::delete('/favorites/destroy/{favorites_id}', ["as" => "favorites.destroy", "uses" => "FavoritesController@destroy"]);



