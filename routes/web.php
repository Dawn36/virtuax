<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;

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
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('company', CompanyController::class);
    Route::resource('user', UserController::class);
    
    Route::post('user_contact_form', [UserController::class, 'userContactForm'])->name('user_contact_form');
    Route::post('user_pk_pass', [UserController::class, 'userPkPass'])->name('user_pk_pass');
    
    Route::get('contact_form', [UserController::class, 'contactForm'])->name('contact_form');
    Route::get('virtual_card', [UserController::class, 'virtualCard'])->name('virtual_card');
    Route::get('user_show/{id}', [UserController::class, 'userShow'])->name('user_show');
    Route::get('user_index', [UserController::class, 'userIndex'])->name('user_index');
    Route::get('user_Qr', [UserController::class, 'userQr'])->name('user_Qr');
    Route::get('user_Qr_add/{userId}', [UserController::class, 'userQrAdd'])->name('user_Qr_add');
    Route::get('user_create', [UserController::class, 'userCreate'])->name('user_create');
    Route::resource('settings', SettingsController::class);
    Route::post('/settings/{id}/updateEmail', [SettingsController::class, 'updateEmail'])->name('updateEmail');
    Route::post('/settings/{id}/updatePassword', [SettingsController::class, 'updatePassword'])->name('updatePassword');
});

Route::get('/', function () {
    return redirect('login');
});

// Route::get('/aaaaaaaaaa', function () {
//     return view('user/user_details');
// })->middleware(['auth'])->name('aaaaaaaaaaaa');

require __DIR__.'/auth.php';
