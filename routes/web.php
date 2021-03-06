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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//Route group for admin pages
Route::group(['middleware' => 'admin'], function (){
    //Insert game routes
    Route::get('/insert', 'InsertGameController@index');
    Route::post('/submitgame', 'InsertGameController@submit');

    //Update game routes
    Route::get('/update', 'UpdateGameController@index');
});

//Routes for game data
Route::get('/aggregatestats', 'GameDataController@aggregatestats');

//Routes for test of datatables
Route::get('/datatable', ['uses'=>'PostController@datatable']);
Route::get('/datatable/getposts', ['as'=>'datatable.getposts','uses'=>'PostController@getPosts']);
