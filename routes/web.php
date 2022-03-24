<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminFrontendController;
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

Route::get('/home', function () {
    return view('home');
});

Route::get('/category',[FrontendController::class,'category']);

Auth::routes();

// Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [FrontendController::class, 'index'])->name('landing');


Route::middleware(['auth', 'isAdmin'])->group(function () {

    // Route::get('/dashboard','Admin\AdminFrontendController@index');
    Route::get('dashboard', [AdminFrontendController::class,'index']);


    //  Categories
     Route::get('categories/list', [CategoryController::class,'index']);
     Route::get('add-categories', [CategoryController::class,'add']);
     Route::post('insert-categories', [CategoryController::class,'insert']);
     Route::get('edit-categories/{id}', [CategoryController::class,'editProduct']);
     Route::post('update-categories', [CategoryController::class,'updateProduct']);
     Route::get('delete-categories/{id}', [CategoryController::class,'destory']);


    //  Products
     Route::get('products/list', [ProductController::class,'index'])->name('products');
     Route::get('add-products', [ProductController::class,'add'])->name('add.products');
     Route::post('insert-products', [ProductController::class,'insert'])->name('insert.products');
     Route::get('edit-product/{id}', [ProductController::class,'editProduct'])->name('edit.product');
     Route::post('update-product', [ProductController::class,'updateProduct'])->name('update.product');
     Route::get('delete-product/{id}', [ProductController::class,'destory'])->name('delete.products');
});
