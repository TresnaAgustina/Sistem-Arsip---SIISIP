<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BsiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\DocumentController;

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



// ===== ViewController =====
Route::controller(ViewController::class)->group(function (){
      // dashboard
      Route::get('/', 'index')->name('Home');
      // register
      Route::get('/reg', 'register')->name('sign-up');
      Route::get('/login', 'login')->name('login');
});


// ==== AuthController =====
Route::controller(AuthController::class)->group(function () {
      // login
      Route::post('/login', 'authenticate');
      // Logout
      Route::post('/logout', 'destroy');
      // Register
      Route::post('/reg', 'register');
});


// ======================================= \\
// ===== Document Archive Controller ===== \\
// ======================================= \\
Route::controller(DocumentController::class)->group(function () {
      // View All Archive Data
      Route::get('/document_data', 'index')
            ->middleware('auth');
      // View Detail Archive Data
      Route::get('/document_detail', 'detail')
            ->middleware('auth');
      // View Insert Data
      Route::get('/document_add', 'add')
            ->middleware('auth');
      // Get Data - Edit Data Archive Document
      Route::get('/document_edit/{id}', 'edit')
            ->middleware('auth');
      
      // Store Data - Insert Data
      Route::post('/document_add', 'store');
      // Store Data - Edit Data Archive Document
      Route::post('/document_update/{id}', 'update');
      // Delete Data - Edit Data Archive Document
      Route::get('/document_destroy/{id}', 'destroy');
});


// ================================================ \\
// ===== Bali Smart Island Controller ===== \\
// ================================================ \\
Route::controller(BsiController::class)->group(function () {
      // View All Data
      Route::get('/bsi_data', 'index')
            ->middleware('auth');
      // View Detail Data
      Route::get('/bsi_detail', 'detail')
            ->middleware('auth');
      // View Insert Data
      Route::get('/bsi_add', 'add')
            ->middleware('auth');
      // Get Data - Edit Data bsi
      Route::get('/bsi_edit/{id}', 'edit')
            ->middleware('auth');
      
      // Store Data - Insert Data
      Route::post('/bsi_add', 'store');
      // Store Data - Edit Data bsi
      Route::post('/bsi_update/{id}', 'update');
      // Delete Data - Edit Data bsi
      Route::get('/bsi_destroy/{id}', 'destroy');
});

