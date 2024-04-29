<?php

use App\Http\Controllers\Admin\TamuController as AdminTamuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\TamuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
// Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::post('simpan-bukutamu', [TamuController::class, 'simpanTamu'])->name('simpan-bukutamu');
Route::group(['middleware' => ['auth']], function () {
    // Route::get('dashboard', [AdminTamuController::class, 'index'])->name('admin-tamu');

    Route::get('admin/tamu', [AdminTamuController::class, 'index'])->name('admin-tamu');
    Route::get('admin/form-tambah', [AdminTamuController::class, 'formTambah'])->name('admin-form-tambah');
    Route::post('admin/simpan-data', [AdminTamuController::class, 'simpanData'])->name('admin-simpan-data');
    Route::get('admin/form-edit/{id}', [AdminTamuController::class, 'formEdit'])->name('admin-form-edit');
    Route::post('admin/update-data', [AdminTamuController::class, 'updateTamu'])->name('admin-update-data');
    Route::post('admin/hapus-data', [AdminTamuController::class, 'hapusTamu'])->name('admin-hapus-data');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-accsess:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-accsess:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('categoris', CategoriController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-accsess:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});