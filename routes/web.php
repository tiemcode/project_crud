<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postsController;
use App\Http\Controllers\categoryController;
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
//home page
Route::get('/', [postsController::class, 'index'])->name('home');
//admin panel
Route::get('/dashboard', [postsController::class, "showAdmin"])
    ->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //logout button
    Route::post('/logoout', function () {
        return view('welcome');
    });
    //edit page
    Route::get('/dashboard/articals/edit/{id}', [postsController::class, 'edit'])->name('index.edit');
    Route::post('/dashboard/articals/edited/{id}', [postsController::class, 'editpost'])->name('edit.post');
    //delete post
    Route::post('/articals/delete/{id}', [postsController::class, 'deletePost'])->name('deletePost');
    //add page
    Route::get('/dashboard/artical/add', [postsController::class, 'addGet'])->name('addpost');
    Route::post('/dashboard/addpost/post', [postsController::class, 'store'])->name('addedpost');
    Route::get('/dashboard/artical/search', [postsController::class, 'search'])->name('search.post');
    //categories page
    Route::get('/dashboard/category', [categoryController::class, 'index'])->name('category.index');

    Route::get('/dashboard/category/add', [categoryController::class, "add"])->name('category.add');
    Route::post('/dashboard/category/store', [categoryController::class, "store"])->name('category.added');


    Route::get('/dashboard/catagory/edit/{id}', [categoryController::class, "edit"])->name('category.edit');
    Route::post('dashboard/category/edited/{id}');

    Route::post('/catagory/delete/{id}', [categoryController::class, "delete"])->name('category.delete');
});

require __DIR__ . '/auth.php';
