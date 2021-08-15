<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebsiteController;
use App\Models\Category;
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

Route::get('/', [WebsiteController::class,'index'])->name('website');
Route::get('posts',[WebsiteController::class,'index'])->name('post.index');
Route::get('post/{slug}',[WebsiteController::class,'details'])->name('post.details');

Route::get('/category/{slug}',[WebsiteController::class,'postByCategory'])->name('category.posts');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('panel/category')->middleware('auth')->name('category.')->group(function(){
    Route::get('/manage',[CategoryController::class,'manage'])->name('manage');
    Route::get('/createForm',[CategoryController::class,'createForm'])->name('createForm');
    Route::post('/create',[CategoryController::class,'create'])->name('create');
    Route::get('/updateForm/{category}',[CategoryController::class,'updateForm'])->name('updateForm');
    Route::post('/update/{category}',[CategoryController::class,'update'])->name('update');
    Route::get('/delete/{category}',[CategoryController::class,'delete'])->name('delete');
});

Route::prefix('panel/post')->middleware('auth')->name('post.')->group(function(){
    Route::get('/manage',[PostController::class,'manage'])->name('manage');
    Route::get('/createForm',[PostController::class,'createForm'])->name('createForm');
    Route::post('/create',[PostController::class,'create'])->name('create');
    Route::get('/updateForm/{post}',[PostController::class,'updateForm'])->name('updateForm');
    Route::post('/update/{post}',[PostController::class,'update'])->name('update');
    Route::get('/delete/{post}',[PostController::class,'delete'])->name('delete');
});

View::composer('layouts.frontend.partial.footer',function ($view) {
    $categories = Category::all();
    $view->with('categories',$categories);
});
