<?php

use App\Http\Controllers\Backend\Config\WebConfigController;
use App\Http\Controllers\Backend\Master\CategoryController;
use App\Http\Controllers\Backend\Master\OutletController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('app')->group(function () {
    Route::middleware(['auth'])->group(function () {

        Route::prefix('master')->name('master.')->group(function(){
            
            Route::prefix('category')->name('category.')->group(function(){
                Route::get('/',[CategoryController::class,'index'])->name('index');
                Route::get('/create',[CategoryController::class,'create'])->name('create');
                Route::post('/create',[CategoryController::class,'store'])->name('store');
                Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('delete');
                Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
                Route::post('/update/{id}',[CategoryController::class,'update'])->name('update');
                Route::get('/show/{id}',[CategoryController::class,'show'])->name('show');
                Route::get('/trash',[CategoryController::class,'trash'])->name('trash');
                Route::get('/restore/{id}',[CategoryController::class,'restore'])->name('restore');
                Route::get('/hard-delete/{id}',[CategoryController::class,'hardDelete'])->name('hard-delete');
            });

            Route::prefix('outlet')->name('outlet.')->group(function(){
                Route::get('/',[OutletController::class,'index'])->name('index');
                Route::get('/create',[OutletController::class,'create'])->name('create');
                Route::post('/create',[OutletController::class,'store'])->name('store');
                Route::get('/delete/{id}',[OutletController::class,'delete'])->name('delete');
                Route::get('/edit/{id}',[OutletController::class,'edit'])->name('edit');
                Route::post('/update/{id}',[OutletController::class,'update'])->name('update');
                Route::get('/show/{id}',[OutletController::class,'show'])->name('show');
                Route::get('/trash',[OutletController::class,'trash'])->name('trash');
                Route::get('/restore/{id}',[OutletController::class,'restore'])->name('restore');
                Route::get('/hard-delete/{id}',[OutletController::class,'hardDelete'])->name('hard-delete');
            });

        });

        
        Route::prefix('setting')->name('setting.')->group(function(){
                Route::get('/web',[WebconfigController::class,'index'])->name('web');
                Route::post('/web',[WebConfigController::class,'update'])->name('web.update');
        });

    });

});

require __DIR__.'/auth.php';
