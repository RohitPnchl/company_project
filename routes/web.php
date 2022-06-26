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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'isAdmin'])->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', 'Admin\AdminController@index')->name('index');

        Route::resource('departments', 'Admin\DepartmentController')->except('show');
        Route::resource('incharges', 'Admin\InchargeController')->except('show');
        Route::resource('assign-department', 'Admin\AssignDepartmentController')->except('show');
    });
});

Route::middleware(['auth:sanctum', 'isUser'])->group(function () {
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', 'UserController@index')->name('index');

        Route::resource('complaints', 'User\ComplaintsController')->except('show');
    });
});

Route::middleware(['auth:sanctum', 'isIncharge'])->group(function () {
    Route::group(['prefix' => 'incharge', 'as' => 'incharge.'], function () {
        Route::get('/', 'InchargeController@index')->name('index');

        Route::resource('complaints', 'Incharge\ComplaintsController')->except('show');
    });
});
// Auth::routes();
//
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
