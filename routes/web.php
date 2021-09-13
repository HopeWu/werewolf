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
    return view('index');
});
Route::get('/color', function () {
    return view('colorful');
});
Route::get('/zg', function () {
    return view('contribution');
});
Route::post('/cook', 'App\Http\Controllers\OrderCookController@cook');
Route::post('/', 'App\Http\Controllers\OrderCookController@cook');
Route::post('/format', 'App\Http\Controllers\OrderCookController@format');
Route::post('/zg', 'App\Http\Controllers\ContributionController@calculate');


Route::get('/game/create', 'App\Http\Controllers\GameController@create');

Route::get('/room', 'App\Http\Controllers\PlayGameController@room');

Route::post('/game/enter', 'App\Http\Controllers\PlayGameController@enter');

Route::post('/game/store', 'App\Http\Controllers\GameController@store');

Route::post('/game/host', 'App\Http\Controllers\HostController@host');

Route::post('/game/host-resign', 'App\Http\Controllers\HostController@hostResign');

Route::post('/game/shuffle-cards', 'App\Http\Controllers\PlayGameController@shuffle');

Route::get('/role', 'App\Http\Controllers\PlayGameController@showRole');

Route::get('/dashboard/{game}', 'App\Http\Controllers\HostController@dashboard');
