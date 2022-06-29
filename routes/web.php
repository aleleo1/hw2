<?php

use Illuminate\Support\Facades\Route;

 use App\Http\Controllers\HomeController;
use  App\Http\Controllers\BanksController;
use  App\Http\Controllers\GameController;
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

 

Route::group(['namespace' => 'App\Http\Controllers'], function()

{   

    /**

     * Home Routes

     */

    Route::get('/', [HomeController::class, 'index'])->name('home.index');

 

    Route::group(['middleware' => ['guest']], function() {

        /**

         * Register Routes

         */

        Route::get('/register', 'RegisterController@show')->name('register.show');

        Route::post('/register', 'RegisterController@register')->name('register.perform');

 

        /**

         * Login Routes

         */

        Route::get('/login', 'LoginController@show')->name('login.show');

        Route::post('/login', 'LoginController@login')->name('login.perform');

 

    });

 

    Route::group(['middleware' => ['auth']], function() {

       
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        Route::get('/banks',[BanksController::class, 'show'])->name('banks');

        Route::get('/theGame', [GameController::class, 'show'])->name('theGame');
        Route::post('/theGame/result', [GameController::class, 'result'])->name('theGame.result');
        Route::post('/banks/original', [BanksController::class, 'original'])->name('banks.original');
        Route::post('/banks/openai', [BanksController::class, 'openai_sumup'])->name('banks.openai');
        Route::post('/banks/like', [BanksController::class, 'like']);
        Route::post('/banks/show_like', [BanksController::class, 'show_like']);
        Route::post('/banks/dislike', [BanksController::class, 'dislike']);
    });

});