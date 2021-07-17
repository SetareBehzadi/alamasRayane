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
})->name('index');

//Auth::routes();


Route::group(['namespace'=>'App\Http\Controllers\Auth'],function (){
    Route::get('register','RegisterController@showRegistrationForm')->name('auth.register.form');
    Route::post('register','RegisterController@register')->name('auth.register');
    Route::get('login','LoginController@showLoginForm')->name('auth.login.form');
    Route::post('login','LoginController@login')->name('auth.login');
    Route::get('logout','LoginController@logout')->name('auth.logout');
});


Route::group(['prefix'=>'admin','middleware' => 'auth'],function (){
    /*Route::get('/','AdminController@index')->name('admin.index');*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile/{order}', [App\Http\Controllers\ProfileController::class, 'update'])->name('submit.order');
Route::post('order/confirm/{id}' , [App\Http\Controllers\ProfileController::class, 'confirm'])->name('confirm.order');
Route::post('order/reject/{id}' , [App\Http\Controllers\ProfileController::class, 'reject'])->name('reject.order');

    Route::group(['namespace'=>'App\Http\Controllers\Admin'],function(){
        Route::get('orders/awaiting' , 'OrderController@awaiting')->name('awaiting.reviews');
        Route::get('orders/verifying' ,'OrderController@verifying')->name('verifying.reviews');
        Route::get('orders/confirming' , 'OrderController@confirming')->name('confirming.reviews');
        Route::get('orders/cancelling' , 'OrderController@cancelling')->name('cancelling.reviews');

        Route::post('order/verify/{id}' , 'OrderController@verify')->name('verify.order');
        Route::post('order/ignore/{id}' , 'OrderController@ignore')->name('ignore.order');
    });

});
Route::prefix('user')->group(function() {
    Route::post('/order', 'OrderController@order')->name('new.order');
});

