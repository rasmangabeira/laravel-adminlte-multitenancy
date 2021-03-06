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

//Auth::routes();

/*
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

*/
###




Route::group(['prefix' => '/system', 'as' => 'system.'], function(){
    Auth::routes();

    Route::get('/', function(){
        return view('auth.login');
    });

    Route::group(['middleware' => 'auth:system'], function(){

        Route::get('home', function () {
            return view('system.home');
        })->name('home');

    });

});


Route::group(['prefix' => '/{environment}', 'as' => 'tenant.'], function(){
    Auth::routes();

    Route::get('/', function(){
        return view('auth.login');
    });

    Route::group(['middleware' => 'auth:tenant'], function(){

        Route::get('home', function () {
            return view('tenant.home');
        })->name('home');;

    });

});

/*
Route::group(['prefix' => '/{environment}', 'as' => 'tenant.'], function () {
    Auth::routes();

    Route::group(['middleware' => 'auth:tenant'], function(){
        Route::name('home')->get('home', function () {
            return view('tenant.home');
        });
        //Route::resource('categories', 'CategoryController');
    });
});
*/