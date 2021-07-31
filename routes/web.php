<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
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

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<< back route >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\\

Route::middleware('checkrole')->prefix('/admin')->group(function() {

Route::get('/', [AdminController::class, 'index'])->name('dashboard');
Route::get('/users', [UserController::class, 'index'])->name('admin.users');
Route::get('/delete/{user}', [UserController::class, 'destroy'])->name('admin.delete.users');
Route::get('/edit-profile/{user}', [UserController::class, 'edit'])->name('admin.edit.user');
Route::get('/clender', [AdminController::class, 'clender'])->name('admin.clender');
Route::post('/update-profile/{user}', [UserController::class, 'update'])->name('admin.update.profile');
Route::get('/status_user/{user}', [UserController::class, 'updatestatus'])->name('admin.user.status');

Route::get('/Posts', [PostController::class, 'index'])->name('admin.posts');
Route::get('/create', [PostController::class, 'create'])->name('admin.create.post');
Route::get('/edit-post/{post}', [PostController::class, 'edit'])->name('admin.edit.post');
Route::any('/delete/{post}', [PostController::class, 'destroy'])->name('admin.delete.post');
Route::post('/create-store', [PostController::class, 'store'])->name('admin.create.store');
Route::post('/update-post/{post}', [PostController::class, 'update'])->name('admin.update.post');
Route::get('/Posts/{post}', [PostController::class, 'updatestatus'])->name('admin.posts.status');

Route::get('/categorys', [CategoryController::class, 'index'])->name('admin.categories');
Route::get('/create-category', [CategoryController::class, 'create'])->name('admin.create.category');
Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
Route::any('/edit-category/{category}', [CategoryController::class, 'edit'])->name('admin.edit.category');
Route::post('/update-category/{category}', [CategoryController::class, 'update'])->name('admin.update.category');
Route::get('/delete-category/{category}', [CategoryController::class, 'destroy'])->name('admin.delete.category');

Route::get('/tags', [TagController::class, 'index'])->name('admin.tags');
Route::get('/create-tag', [TagController::class, 'create'])->name('admin.create.tag');
Route::post('/tag-store', [TagController::class, 'store'])->name('tag.store');
Route::get('/status_tag/{tag}', [TagController::class, 'updatec_status_tag'])->name('admin.tags.status');
Route::get('/edit-tag/{tag}', [TagController::class, 'edit'])->name('admin.edit.tag');
Route::post('/update-tag/{tag}', [TagController::class, 'update'])->name('update.tag');
Route::get('/delete-tags/{tag}', [TagController::class, 'destroy'])->name('admin.delete.tag');

Route::get('/comments', [CommentController::class, 'index'])->name('admin.comments');
Route::get('/comment/{comment}', [CommentController::class, 'updatec_status_comment'])->name('admin.comments.status');
Route::get('/edit_comment/{comment}', [CommentController::class, 'edit'])->name('admin.comments.edit');
Route::post('/update_comment/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::get('/delete-comment/{comment}', [CommentController::class, 'destroy'])->name('admin.comments.destroy');

});

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<< front route >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\\

Route::get('/edit-profile/{user}', [App\Http\Controllers\EditController::class, 'edit'])->name('edit.profile');
Route::post('/update-profile/{user}', [App\Http\Controllers\EditController::class, 'update'])->name('update.profile');

Auth::routes(['verify' => true]);

Route::post('/', [App\Http\Controllers\HomeController::class, 'posts']);
Route::post('/post/{id}', [App\Http\Controllers\HomeController::class, 'post']);
Route::post('/comment', [App\Http\Controllers\HomeController::class, 'show']);
Route::get('/{vue_capture?}', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->where('vue_capture', '[\/\w\.-]*');


