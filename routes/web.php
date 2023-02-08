<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AppointmentsController;
use App\Models\User;
use Illuminate\Http\Request;

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

Route::get('/home', function () {
    return view('index');
})->name('index')->middleware();

Route::get('/health', function () {
    return view('health');
})->name('health');

Route::get('/medicine', function () {
    return view('medicine');
})->name('medicine');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/client', function () {
    return view('client');
})->name('client');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/register', [UsersController::class, 'register'])->name('register');
Route::post('/store_user', [UsersController::class, 'store_user'])->name('store_user');
Route::get('/login', [UsersController::class, 'login'])->name('login');
Route::post('/authenticate', [UsersController::class, 'authenticate'])->name('authenticate');
Route::get('/forgot_password', [UsersController::class, 'forgot_password'])->name('forgot_password');
Route::get('/dashboard',function() {
	if(auth()->user()) {
		return view('admin.layout');
	}
	return redirect()->route('login');
})->name('dashboard')->middleware('auth');
Route::post('/forgot-password')->name('forgot-password')->middleware('verified');
Route::get('/user_profile', [UsersController::class, 'user_profile'])->name('user_profile');
Route::post('/update_user', [UsersController::class, 'update_user'])->name('update_user');

Route::put('/change_password', [UsersController::class, 'change_password'])->name('change_password');

Route::get('/logout', [UsersController::class, 'logout'])->name('logout');


Route::get('/create_appointment', [AppointmentsController::class, 'create_appointment'])->name('create_appointment')->middleware('auth');

Route::post('/book_appointment', [AppointmentsController::class, 'book_appointment'])->name('book_appointment')->middleware('auth');

Route::get('/my_appointments', [AppointmentsController::class, 'my_appointments'])->name('my_appointments')->middleware('auth');

Route::delete('/cancel_appointment', [AppointmentsController::class, 'cancel_appointment'])->name('cancel_appointment')->middleware('auth');
Route::put('/reschedule_appointment', [AppointmentsController::class, 'reschedule_appointment'])->name('reschedule_appointment')->middleware('auth');

Route::delete('/delete_profile_image', [UsersController::class, 'delete_profile_image'])->name('delete_profile_image')->middleware('auth');


Route::get('/testing', function(Request $request) {
	$url = $request->fullUrlWithQuery([
		'opt' => 'value',
		'val' =>'opt'
	]);
	$host = $request->schemeAndHttpHost();
	$method = $request->method();
	$header = $request->header('user-agent');
	$token = $request->bearerToken();
	$ip = $request->ip();
	$acceptableContents = $request->getAcceptableContentTypes();
	$isPreferred = $request->prefers(['text/html','application/json']);
	$expectsJson = $request->expectsJson();
	$inputs = $request->all();
	$collection = $request->collect();
	$specificInput = $request->input('lines', 40);
	$query = $request->query('line');
	$queryAll = $request->query();
	$stringableInput = $request->string('que')->trim();

	$data = [ $url, $host, $method, $header,$token, $ip,$acceptableContents,$isPreferred, $expectsJson, $inputs, $collection, $specificInput, $query,$queryAll, $stringableInput];

	return view('admin.prac', [
		'data' => ['finn','barrack','balaack']
	]);
	//
	
});
