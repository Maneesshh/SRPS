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
    return view('new.index');
});
Route::get('about', function () {
    return view('new.about');
});
Route::get('contact', function () {
    return view('new.contact');
});
Route::get('teacher', function () {
    return view('new.teacher');
});
Route::get('vehicle', function () {
    return view('new.vehicle');
});
Route::get('test', function() {
    return view('admin.StudentResult.index');
});
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('myprofile');
    Route::get('/addexam', 'App\Http\Controllers\DashboardController@addexam')->name('addexam');

});
// Route::group(['middleware' => ['auth', 'role:parents']], function() { 
//     Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
// });

require __DIR__.'/auth.php';
