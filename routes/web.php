<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

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


Route::controller(AuthController::class)->group( function () {

    Route::get('/', 'index');
    Route::post('login', 'login')->name('user.login'); 
    Route::get('logout', 'logout'); 
    Route::get('registration', 'registrationForm');
    Route::post('registration', 'registration')->name('create.user'); 
    Route::get('dashboard', 'dashboard');
    Route::get('user/profile', 'userProfile');
    Route::post('user/profile/update', 'userProfileUpdate')->name('user.profile');
    Route::get('user/change/password', 'userChangePassword');
    Route::post('user/update/password', 'userUpdatePassword')->name('password.update');
    Route::get('forgot-password', 'forgotPasswordForm');
    Route::post('forgot-password', 'forgotPassword')->name('forget.password'); 
    Route::get('reset-password/{token}', 'resetPasswordForm')->name('reset.password');
    Route::post('reset-password', 'resetPassword')->name('update.password');

});



Route::controller(ContactController::class)->prefix('contact')->group( function () {

    Route::get('add', 'index');
    Route::post('store', 'store')->name('store.contact'); 
    Route::get('/{id}/edit', 'edit');
    Route::post('/{id}/update', 'update')->name('update.contact'); 
    Route::get('/{id}/delete', 'delete');
    Route::get('/{id}/view', 'view');
    Route::post('/favourite/{contact_id}', 'favouriteContact');
    Route::get('/favourite', 'viewFavouriteContact')->name('contact.favourite');

});


