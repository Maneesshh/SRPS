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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('myprofile');
    Route::get('/addexam', 'App\Http\Controllers\DashboardController@addexam')->name('addexam');
});
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    //class
    Route::get('/createclass', 'App\Http\Controllers\DashboardController@createclass')->name('createclass');
    Route::get('/manageclass', 'App\Http\Controllers\DashboardController@manageclass')->name('manageclass');
    //subject
    Route::get('/createsub', 'App\Http\Controllers\DashboardController@createsub')->name('createsub');
    Route::get('/managesub', 'App\Http\Controllers\DashboardController@managesub')->name('managesub');
    Route::get('/addsubc', 'App\Http\Controllers\DashboardController@addsubc')->name('addsubc');
    Route::get('/managesubc', 'App\Http\Controllers\DashboardController@managesubc')->name('managesubc');
    //exam
    Route::get('/createexam', 'App\Http\Controllers\DashboardController@createexam')->name('createexam');
    Route::get('/manageexam', 'App\Http\Controllers\DashboardController@manageexam')->name('manageexam');
    //teachers
    Route::get('/createteacher', 'App\Http\Controllers\DashboardController@createteacher')->name('createteacher');
    Route::get('/manageteacher', 'App\Http\Controllers\DashboardController@manageteacher')->name('manageteacher');
    Route::get('/addteacherc', 'App\Http\Controllers\DashboardController@addteacherc')->name('addteacherc');
    Route::get('/manageteacherc', 'App\Http\Controllers\DashboardController@manageteacherc')->name('manageteacherc');
    //students
    Route::get('/createstudent', 'App\Http\Controllers\DashboardController@createstudent')->name('createstudent');
    Route::get('/managestudent', 'App\Http\Controllers\DashboardController@managestudent')->name('managestudent');
     //parents
     Route::get('/createparent', 'App\Http\Controllers\DashboardController@createparent')->name('createparent');
     Route::get('/manageparent', 'App\Http\Controllers\DashboardController@manageparent')->name('manageparent');
     Route::get('/addparentc', 'App\Http\Controllers\DashboardController@addparentc')->name('addparentc');
     Route::get('/manageparentc', 'App\Http\Controllers\DashboardController@manageparentc')->name('manageparentc');

});

require __DIR__ . '/auth.php';
