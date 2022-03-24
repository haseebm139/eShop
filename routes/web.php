<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\ProductController;
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

Route::get('category',[Frontend\FrontendController::class,'category']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/landing', [FrontendController::class, 'index'])->name('landing');

//  Route::group(['middleware' => ['auth','isAdmin']], function () {

//    Route::get('/dashboard', function () {
//       return view('admin.index');
//    });

// });


Route::middleware(['auth', 'isAdmin'])->group(function () {
     Route::get('/dashboard',[FrontendController::class ,'index']);

    //  Categories
     Route::get('categories', [CategoryController::class,'index'])->name('categories');
     Route::get('add-categories', [CategoryController::class,'add'])->name('add.categories');
     Route::post('insert-categories', [CategoryController::class,'insert'])->name('insert.categories');
     Route::get('edit-categories/{id}', [CategoryController::class,'editProduct'])->name('edit.categories');
     Route::post('update-categories', [CategoryController::class,'updateProduct'])->name('update.categories');
     Route::get('delete-categories/{id}', [CategoryController::class,'destory'])->name('delete.categories');


    //  Products
     Route::get('products', [ProductController::class,'index'])->name('products');
     Route::get('add-products', [ProductController::class,'add'])->name('add.products');
     Route::post('insert-products', [ProductController::class,'insert'])->name('insert.products');
     Route::get('edit-product/{id}', [ProductController::class,'editProduct'])->name('edit.product');
     Route::post('update-product', [ProductController::class,'updateProduct'])->name('update.product');
     Route::get('delete-product/{id}', [ProductController::class,'destory'])->name('delete.products');
});
