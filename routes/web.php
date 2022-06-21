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
    Route::get('/myprofile', 'App\Http\Controllers\SharedController@myprofile')->name('myprofile');
    Route::put('/updateprofile', 'App\Http\Controllers\SharedController@updateprofile')->name('updateprofile');
    Route::get('/change-password', 'App\Http\Controllers\ChangePasswordController@index');
    Route::post('/change-password', 'App\Http\Controllers\ChangePasswordController@store')->name('change.password');
});
Route::group(['middleware' => ['auth', 'role:admin|teachers']], function () {
    //class
    Route::get('/createclass', 'App\Http\Controllers\SharedController@createclass')->name('createclass');
    Route::get('/manageclass', 'App\Http\Controllers\SharedController@manageclass')->name('manageclass');
    Route::post('/insert-class', 'App\Http\Controllers\SharedController@insertclass')->name('insertclass');
    Route::get('/delete/{id}', 'App\Http\Controllers\SharedController@delclass')->name('delclass');
    Route::get('/editclass/{id}', 'App\Http\Controllers\SharedController@editclass')->name('editclass');
    Route::put('/update-class', 'App\Http\Controllers\SharedController@updateclass')->name('updateclass');
    //subject
    Route::get('/createsub', 'App\Http\Controllers\SharedController@createsub')->name('createsub');
    Route::post('/insert-sub', 'App\Http\Controllers\SharedController@insertsub')->name('insertsub');
    Route::get('/managesub', 'App\Http\Controllers\SharedController@managesub')->name('managesub');
    Route::get('/editsub/{id}', 'App\Http\Controllers\SharedController@editsub')->name('editsub');
    Route::put('/update-sub', 'App\Http\Controllers\SharedController@updatesub')->name('updatesub');
    Route::get('/deletesub/{id}', 'App\Http\Controllers\SharedController@removesub')->name('removesub');
    Route::get('/addsubc', 'App\Http\Controllers\SharedController@addsubc')->name('addsubc');
    Route::post('/addsubcomb', 'App\Http\Controllers\SharedController@addsubcomb')->name('addsubcomb');
    Route::get('/managesubc', 'App\Http\Controllers\SharedController@managesubc')->name('managesubc');
    //exam
    Route::get('/createexam', 'App\Http\Controllers\ExamController@createexam')->name('createexam');
    Route::post('/insertexam', 'App\Http\Controllers\ExamController@insertexam')->name('insertexam');
    Route::get('/editexam/{id}', 'App\Http\Controllers\ExamController@editexam')->name('editexam');
    Route::put('/updateexam', 'App\Http\Controllers\ExamController@updateexam')->name('updateexam');
    Route::get('/deleteexam/{id}', 'App\Http\Controllers\ExamController@removeexam')->name('removeexam');
    Route::get('/manageexam', 'App\Http\Controllers\ExamController@manageexam')->name('manageexam');
    Route::get('/tsheet', 'App\Http\Controllers\ExamController@tsheet')->name('tsheet');
    Route::get('/marks', 'App\Http\Controllers\ExamController@marks')->name('marks');
    Route::get('/marksheet', 'App\Http\Controllers\ExamController@marksheet')->name('marksheet');

    //teachers
    Route::get('/createteacher', 'App\Http\Controllers\SharedController@createteacher')->name('createteacher');
    Route::get('/manageteacher', 'App\Http\Controllers\SharedController@manageteacher')->name('manageteacher');
    Route::get('/addteacherc', 'App\Http\Controllers\SharedController@addteacherc')->name('addteacherc');
    Route::get('/editteacher/{id}', 'App\Http\Controllers\SharedController@editteacher')->name('editteacher');
    Route::get('/deleteuser/{id}', 'App\Http\Controllers\SharedController@deleteuser')->name('deleteuser');

    Route::put('/updateteacher', 'App\Http\Controllers\SharedController@updateteacher')->name('updateteacher');
    Route::get('/manageteacherc', 'App\Http\Controllers\SharedController@manageteacherc')->name('manageteacherc');
    //students
    Route::get('/createstudent', 'App\Http\Controllers\SharedController@createstudent')->name('createstudent');
    Route::post('/addstudent', 'App\Http\Controllers\SharedController@addstudent')->name('addstudent');
    Route::get('/managestudent', 'App\Http\Controllers\SharedController@managestudent')->name('managestudent');
    //parents
    Route::get('/createparent', 'App\Http\Controllers\SharedController@createparent')->name('createparent');
    Route::get('/manageparent', 'App\Http\Controllers\SharedController@manageparent')->name('manageparent');
    Route::get('/addparentc', 'App\Http\Controllers\SharedController@addparentc')->name('addparentc');
    Route::get('/manageparentc', 'App\Http\Controllers\SharedController@manageparentc')->name('manageparentc');
    //Users
    Route::get('/auser', 'App\Http\Controllers\SharedController@auser')->name('auser');
    Route::post('/addusers', 'App\Http\Controllers\SharedController@addusers')->name('addusers');
    Route::get('/edituser/{id}', 'App\Http\Controllers\SharedController@edituser')->name('edituser');
    Route::put('/updateuser', 'App\Http\Controllers\SharedController@updateuser')->name('updateuser');
    //Grades
    Route::get('/grades', 'App\Http\Controllers\GradeController@index')->name('index');
    Route::post('/addgrade', 'App\Http\Controllers\GradeController@create')->name('addgrade');
    Route::get('/editgrade/{id}', 'App\Http\Controllers\GradeController@edit')->name('editgrade');
    Route::put('/updategrade', 'App\Http\Controllers\GradeController@update')->name('updategrade');
    Route::get('/deletegrade/{id}', 'App\Http\Controllers\GradeController@destroy')->name('deletegrade');

});

require __DIR__ . '/auth.php';
