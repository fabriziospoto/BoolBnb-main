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

Auth::routes();

// Guest Controller
Route::get('/', 'Guest\HomeController@index')->name('home');
Route::get('/guest/show/{id}', 'Guest\HomeController@show')->name('guest.show');
Route::post('/guest/show', 'Guest\HomeController@search')->name('guest.search');

// Message Controller
Route::get('/user/apartments/messages/show/{id}', 'MessageController@show')->name('message.show');
Route::post('/', 'MessageController@store')->name('message.store');
Route::delete('/user/apartments/messages/{message}', 'MessageController@destroy')->name('message.destroy');

// Payment Controller
Route::post('/user/promo/{apartment}/{promo}', [
    'as' => 'apartments.promo.payment', 'uses' => 'User\PaymentController@promo']);

Route::post('/user/promo/upload', [
    'as' => 'apartments.promo.upload', 'uses' => 'User\PaymentController@store']);

// Image Controller

// Layout create image (dopo creazione apartment)  *  step 1
Route::get('/user/apartments/images/image-create/{id}', 'User\ApartmentController@imagecreate')->name('image.create');
// Crea il record nella tabella images in db, salvataggio immagini il public/upload/  * step 2
Route::post('/image-submit', 'User\ApartmentController@imageupload');

// Gestione immagine dall'utente
Route::get('/user/apartments/images/{apartment}/image-edit', 'User\ApartmentController@imageedit')->name('image.edit');
// Delete
Route::delete('/image-delete/{image}', 'User\ApartmentController@imagedelete')->name('image.delete');

// User Controller
Route::prefix('user')->namespace('User')->middleware('auth')->group(function () {

    Route::resource('apartments', 'ApartmentController');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/show/{user}', 'HomeController@show')->name('user.show');    
    Route::patch('/{user}', 'HomeController@update')->name('user.update');

    // toggle visible
    Route::get('toggle/{id}', 'ApartmentController@toggle')->name('apartments.toggle');


});
