<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BsiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ExportFileController;
use App\Http\Controllers\InfrastructureController;

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
      // login
      Route::get('/login', 'login')->name('login');
});


// ==== AuthController =====
Route::controller(AuthController::class)->group(function () {
      // login
      Route::post('/login', 'authenticate');
      // Logout
      Route::post('/logout', 'destroy');
});


// ======================================= \\
// ===== Document Archive Controller ===== \\
// ======================================= \\
Route::controller(DocumentController::class)->group(function () {
      // View All Archive Data
      Route::get('/document', 'index')
            ->middleware('auth');
      // View Detail Archive Data
      Route::get('/document/detail', 'detail')
            ->middleware('auth');
      // View Insert Data
      Route::get('/document/add', 'add')
            ->middleware('auth');
      // Get Data - Edit Data Archive Document
      Route::get('/document/edit/{id}', 'edit')
            ->middleware('auth');
      
      // Store Data - Insert Data
      Route::post('/document/add', 'store');
      // Store Data - Edit Data Archive Document
      Route::post('/document/update/{id}', 'update');
      // Delete Data - Edit Data Archive Document
      Route::get('/document/destroy/{id}', 'destroy');
});


// ================================================ \\
// ===== Bali Smart Island Controller ===== \\
// ================================================ \\
Route::controller(BsiController::class)->group(function () {
      // View All Data
      Route::get('/bsi', 'index')
            ->middleware('auth');
      // View Detail Data
      Route::get('/bsi/detail', 'detail')
            ->middleware('auth');
      // View Insert Data
      Route::get('/bsi/add', 'add')
            ->middleware('auth');
      // Get Data - Edit Data bsi
      Route::get('/bsi/edit/{id}', 'edit')
            ->middleware('auth');
      
      // Store Data - Insert Data
      Route::post('/bsi/add', 'store');
      // Store Data - Edit Data bsi
      Route::post('/bsi/update/{id}', 'update');
      // Delete Data - Edit Data bsi
      Route::get('/bsi/destroy/{id}', 'destroy');
});



// ================================================ \\
// ===== Infrastructures Controller ===== \\
// ================================================ \\
Route::controller(InfrastructureController::class)->group(function () {
      // View All Data
      Route::get('/infrastructure', 'index')
            ->middleware('auth');
      // View Detail Data
      Route::get('/infrastructure/detail', 'detail')
            ->middleware('auth');
      // View Insert Data
      Route::get('/infrastructure/add', 'add')
            ->middleware('auth');
      // Get Data - Edit Data infrastructures
      Route::get('/infrastructure/{id}/edit', 'edit')
            ->middleware('auth');
      // Get Data - Detail Data infrastructure
      Route::get('/infrastructure/{id}/detail', 'detail')
            ->middleware('auth');
      
      // Store Data - Insert Data
      Route::post('/infrastructure/add', 'store');
      // Store Data - Edit Data infrastructures
      Route::post('/infrastructure/{id}/update', 'update');
      // Delete Data - Edit Data infrastructures
      Route::get('/infrastructure/{id}/destroy', 'destroy');
});


// ================================================ \\
// ===== Export to Excel Route ===== \\
// ================================================ \\
Route::controller(ExportFileController::class)->group(function () {
      // export excel for document
      Route::get('/document/exportExcel', 'DocExportExcel');

      // export excel for Bsi Data
      Route::get('/bsi/exportExcel', 'BsiExportExcel');

      // export excel for Infrastructure Data
      Route::get('/infra/exportExcel', 'InfraExportExcel');
});
