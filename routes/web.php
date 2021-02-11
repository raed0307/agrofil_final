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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return 'you are admin';
})->middleware(['auth', 'auth.admin']);

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function () {
    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
    Route::get('/impersonate/user/{id}', 'ImpersonateController@index')->name('impersonate');
});
Route::get('/admin/impersonate/destroy', 'Admin\ImpersonateController@destroy')->name('admin.impersonate.destroy');

Route::namespace('Client')->prefix('clients')->middleware(['auth', 'auth.user'])->name('clients')->group(function () {

    Route::get('/', 'ClientController@index')->name('index');
    Route::get('/create-step-one', 'ClientController@createStepOne')->name('CreateStepOne');
    Route::post('/create-step-one', 'ClientController@postCreateStepOne')->name('CreateStepOneSave');
    Route::get('/create-step-two', 'ClientController@createStepTwo')->name('CreateStepTwo');
    Route::post('/create-step-two', 'ClientController@postCreateStepTwo')->name('CreateStepTwoSave');
    Route::get('/create-step-three', 'ClientController@createStepThree')->name('CreateStepThree');
    Route::post('/create-step-three', 'ClientController@postCreateStepThree')->name('CreateStepThreeSave');
    Route::get('/create-step-Four', 'ClientController@createStepFour')->name('CreateStepFour');
    Route::post('/create-step-Four', 'ClientController@postCreateStepFour')->name('CreateStepFourSave');
});
