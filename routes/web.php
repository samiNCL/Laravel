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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/excite', 'WordsController@posts');


Route::resource('/words', 'WordsController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/table', 'WordsController@table');

Route::get('/a2z', 'WordsController@a2z');


//Route for search button. goes for table form and put the keyword there
Route::post('/search', 'WordsController@search');

Route::get('/test', 'WordsController@test');

Route::get('/chart', 'WordsController@chart');

Route::get('/help', function () {
    return view('help');
});






//
//Route::get('/remove', 'WordsController@destroy');


//Route::get('/note','WordsController@Gsinglestore');
//Route::post('/note','WordsController@Psinglestore');


