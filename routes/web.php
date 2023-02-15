<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
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

// User Route
Route::post('/forgot-password', [UsersController::class, 'verify'])->name('forgot-password');
Route::get('/user_profile', [UsersController::class, 'user_profile'])->name('user_profile');
Route::post('/update_user', [UsersController::class, 'update_user'])->name('update_user');

Route::patch('/delete_profile_image_',[UsersController::class, 'delete_profile_image'])->name('delete_profile_image')->middleware('auth');
Route::put('/change_password', [UsersController::class, 'change_password'])->name('change_password');

Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
Route::patch('/user_status', [UsersController::class, 'user_status'])->name('user_status')->middleware('auth');
Route::delete('/delete_profile_image', [UsersController::class, 'delete_profile_image'])->name('delete_profile_image')->middleware('auth');
//Route::get('/user_appointments', [UsersController::class, 'user_appointments'])->name('user_appointments')->middleware('auth');
// End of User Route


//Appointment Routes

Route::get('/create_appointment', [AppointmentsController::class, 'create_appointment'])->name('create_appointment')->middleware('auth');

Route::post('/book_appointment', [AppointmentsController::class, 'book_appointment'])->name('book_appointment')->middleware('auth');

Route::get('/my_appointments', [AppointmentsController::class, 'my_appointments'])->name('my_appointments')->middleware('auth');

Route::delete('/cancel_appointment', [AppointmentsController::class, 'cancel_appointment'])->name('cancel_appointment')->middleware('auth');

Route::put('/reschedule_appointment', [AppointmentsController::class, 'reschedule_appointment'])->name('reschedule_appointment')->middleware('auth');

Route::get('/appointment_details', [AppointmentsController::class, 'appointment_details'])->name('appointment_details')->middleware('auth');

// Admin Route for doctors 

Route::get('/doctors', [AdminController::class, 'doctors'])->name('doctors')->middleware('auth');
Route::post('/store_doctors', [AdminController::class, 'store_doctor'])->name('store_doctor')->middleware('auth');
Route::get('/view_doctor/{id}', [AdminController::class, 'view_doctor'])->name('view_doctor')->middleware('auth');

Route::post('/update_doctor', [AdminController::class, 'update_doctor'])->name('update_doctor')->middleware('auth');

Route::delete('/delete_doctor/{id}', [AdminController::class, 'delete_doctor'])->name('delete_doctor')->middleware('auth');


// Admin Route for admins
Route::get('/admins', [AdminController::class, 'admins'])->name('admins')->middleware('auth');
Route::get('/view_admin/{id}', [AdminController::class, 'view_admin'])->name('view_admin')->middleware('auth');
Route::post('/store_admin', [AdminController::class, 'store_admin'])->name('store_admin')->middleware('auth');
Route::post('/update_admin', [AdminController::class, 'update_admin'])->name('update_admin')->middleware('auth');

Route::delete('/delete_admin/{id}', [AdminController::class, 'delete_admin'])->name('delete_admin')->middleware('auth');

//admin routes for nurses

Route::get('/nurses', [AdminController::class, 'nurses'])->name('nurses')->middleware('auth');
Route::get('/view_nurse/{id}', [AdminController::class, 'view_nurse'])->name('view_nurse')->middleware('auth');
Route::post('/store_nurse', [AdminController::class, 'store_nurse'])->name('store_nurse')->middleware('auth');
Route::post('/update_nurse', [AdminController::class, 'update_nurse'])->name('update_nurse')->middleware('auth');

Route::delete('/delete_nurse/{id}', [AdminController::class, 'delete_nurse'])->name('delete_nurse')->middleware('auth');

//routes for patient
Route::get('/patients', [PatientController::class, 'patients'])->name('patients')->middleware('auth');
Route::get('/view_patient/{id}', [PatientController::class, 'view_patient'])->name('view_patient')->middleware('auth');
Route::post('/store_patient', [PatientController::class, 'store_patient'])->name('store_patient')->middleware('auth');
Route::post('/update_patient', [PatientController::class, 'update_patient'])->name('update_patient')->middleware('auth');

Route::delete('/delete_patient/{id}', [PatientController::class, 'delete_patient'])->name('delete_patient')->middleware('auth');
