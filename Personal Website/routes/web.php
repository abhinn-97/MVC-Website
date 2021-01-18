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

Route::get('/', function () {
    return view('user_home');
});

Route::get('/edit', function(){
	return view('edituser');
});

Route::get('/login', function(){
	return view('login');
});

Route::get('/signup', function(){
	return view('signup');
});

Route::get('/admin_home', function(){
	return view('admin_home');
});


Route::get('/user_projects', function(){
	return view('user_projects');
});

Route::get('/sendemail', 'SendMailController@index');
Route::post('/sendemail/send', 'SendMailController@send');
Route::get('people/CreatePeople', function(){
	return view('master');
});
Route::resource('people', 'PeopleController');
Route::resource('projects', 'ProjectController');
Route::resource('userproject', 'UserProjectController');
Route::resource('education', 'EducationController');
Route::resource('usereducation', 'UserEducationController');
Route::resource('hire', 'HireController');
Route::resource('userhire', 'UserHireController');
Route::resource('work', 'WorkController');
Route::resource('userwork', 'UserWorkController');
Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('main/successlogin', 'MainController@successlogin');
Route::get('main/logout', 'MainController@logout');
Route::post('/store','MainController@store');
//Route::view('main/admin_home','admin_home');
