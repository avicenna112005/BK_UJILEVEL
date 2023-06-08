<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UIController;

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
    return view('welcome');
});

// UI

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


//Admin Pages
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    route::get('/dashboardadmin', [UIController::class, 'dashboardadmin'])->name('admin');
    route::get('/kelasadmin', [UIController::class, 'kelasadmin'])->name('kelasadmin');
    route::get('/walikelasadmin', [UIController::class, 'walikelasadmin'])->name('walikelasadmin');
    route::get('/guruadmin', [UIController::class, 'guruadmin'])->name('guruadmin');
    route::get('/muridadmin', [UIController::class, 'muridadmin'])->name('muridadmin');
    route::get('/tambahmurid', [UIController::class, 'tambahmurid'])->name('tambahmurid');
    route::post('/insertmurid', [UIController::class, 'insertmurid'])->name('insertmurid');
    route::get('/editmurid/{id}', [UIController::class, 'editmurid'])->name('editmurid');
    route::post('/updatemurid/{id}', [UIController::class, 'updatemurid'])->name('updatemurid');
    route::get('/hapusmurid/{id}', [UIController::class, 'hapusmurid'])->name('hapusmurid');
});

Route::group(['middleware' => ['auth', 'ceklevel:guru']], function () {
    Route::get('/guru', [UIController::class, 'guru'])->name('guru');
});

Route::group(['middleware' => ['auth', 'ceklevel:walikelas']], function () {
    route::get('/walikelas', [UIController::class, 'walikelas'])->name('walikelas');
});

Route::group(['middleware' => ['auth', 'ceklevel:murid']], function () {
    Route::get('/murid', [UIController::class, 'murid'])->name('murid');
});
