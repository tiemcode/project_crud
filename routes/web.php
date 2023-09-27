<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postsController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\rolesController;

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
Route::get('/projects', [projectController::class, 'home'])->name('project.home');
//admin panel
Route::get('/dashboard', [postsController::class, "showAdmin"])
    ->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //logout button
    Route::post('/logoout', function () {
        return view('welcome');
    });
    //artical page
    Route::prefix('/dashboard')->group(function () {
        Route::prefix('/articals')->group(function () {
            Route::get('/edit/{id}', [postsController::class, 'edit'])->name('index.edit');
            Route::post('/edited/{id}', [postsController::class, 'editpost'])->name('edit.post');
            Route::delete('/delete/{id}', [postsController::class, 'deletePost'])->name('deletePost');
            Route::get('/add', [postsController::class, 'addGet'])->name('addpost');
            Route::post('/addpost/post', [postsController::class, 'store'])->name('addedpost');
            Route::get('/artical/search', [postsController::class, 'search'])->name('search.post');
        });
        //categories page
        Route::get('/category', [categoryController::class, 'index'])->name('category.index');
        Route::get('/category/add', [categoryController::class, "add"])->name('category.add');
        Route::post('/category/store', [categoryController::class, "store"])->name('category.added');
        Route::get('/ashboard/catagory/id={id}', [categoryController::class, "edit"])->name('category.edit');
        Route::post('/category/id={id}/edited', [categoryController::class, 'update'])->name('category.edited');
        Route::delete('/catagory/delete/{id}', [categoryController::class, "delete"])->name('category.delete');
        //projects page
        Route::get('/projects', [projectController::class, 'index'])->name('projects.index');
        Route::get('/projects/{id}/edit', [projectController::class, 'edit'])->name('projects.edit');
        Route::get('/projects/add', [projectController::class, 'add'])->name('projects.add');
        Route::post('/projects/{id}/deleted', [projectController::class, 'delete'])->name('projects.delete');
        Route::get('/projects/{id}/users', [projectController::class, 'getUser'])->name('projects.user');
        Route::get('/projects/{projectId}/users/edit/{userId}', [projectController::class, 'editUser'])->name('projects.user.edit');
        Route::delete('/projects/{id}/users/delete', [projectController::class, 'deleteUser'])->name('projects.user.delete');
        Route::post('/projects/{projectId}/user/edited/{userId}', [projectController::class, 'updateUser'])->name('project.user.update');
        Route::get('/projects/{id}/user/add', [projectController::class, 'adduser'])->name('project.user.add');
        Route::get('/projects/search', [projectController::class, 'search'])->name('project.search');
        Route::post('/projects/{id}/user/added', [projectController::class, 'addeduser'])->name('project.user.added');
        //roles
        Route::get('/roles', [rolesController::class, 'index'])->name('roles.index');
        Route::get('/roles/add', [rolesController::class, "add"])->name('roles.add');
        Route::post('/roles/store', [rolesController::class, "store"])->name('roles.added');
        Route::get('/roles/id={id}', [rolesController::class, "edit"])->name('roles.edit');
        Route::post('roles/id={id}/edited', [rolesController::class, 'update'])->name('roles.edited');
        Route::delete('/roles/delete/{id}', [rolesController::class, "delete"])->name('roles.delete');
        Route::get('/roles/search', [rolesController::class, 'search'])->name('roles.search');
    });
});

require __DIR__ . '/auth.php';
