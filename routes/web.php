<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



//Recipes
Route::get('/', 'RecipeController@index')->name('recipes');
Route::get('/recipes', 'RecipeController@index')->name('recipes');
Route::get('/recipes/new', 'RecipeController@create')->name('new_recipe');
Route::get('/recipes/{recipe}', 'RecipeController@show')->name('show_recipe');
Route::get('/recipes/edit/{id}', 'RecipeController@edit')->name('edit_recipe');

//Route::post('/upload/image', ['uses' => 'ImageController@uploadImage', 'as' => 'upload.image']);
Route::post('/recipes/{id}', 'RecipeController@store');
Route::post('/recipes/new', 'RecipeController@store');
