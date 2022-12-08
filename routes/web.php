<?php

use Illuminate\Support\Facades\Route;
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


// Route::get('/document_data', DocumentController::class, 'index');

// ===== Document Archive Controller =====
Route::controller(DocumentController::class)->group(function () {
      // View All Archive Data
      Route::get('/document_data', 'index');
      // View Detail Archive Data
      Route::get('/document_detail', 'detail');
      // Get Data - Edit Data Archive Document
      Route::get('/document_edit', 'edit');
      // Store Data - Insert Data
      Route::get('/document_add', 'add');
      // Store Data - Edit Data Archive Document
      Route::post('/document_update', 'update');
      // Delete Data - Edit Data Archive Document
      Route::post('/document_destroy', 'destroy');
});

