<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use \App\Http\Controllers\Frontend\ProfileController;
use \App\Http\Controllers\Admin\BLogController;
use \App\Http\Controllers\Frontend\CommentController;
use \App\Http\Controllers\Frontend\PageController;
use \App\Http\Controllers\Frontend\EventController;
use \App\Http\Controllers\Frontend\FriendController;
use \App\Http\Controllers\Frontend\FavouriteController;
 
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;

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


// homepage
Route::get('/', function () {
    return view('homepage');
})->name('homepage')->middleware('guest');


// authentication page route

Route::get('/login', function () {
    return view('auth.login');
})->name('login.page')->middleware('guest');
Route::get('/register', function () {
    return view('auth.register');
})->name('register.page')->middleware('guest');


// admin

Route::middleware(['auth','isAdmin'])->group(function () {


    Route::get('/dashboard1', [DashboardController::class, 'dashboard'])->name('dashboard1');
    Route::resource('categories', CategoryController::class)->only(['index','store','update']);
    Route::post('/categories/delete',[CategoryController::class,'delete'])->name('categories.delete');
});





// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::resource('events', EventController::class)->middleware('auth');
Route::get('/admin/events', [EventController::class, 'admin_event'])->name('admin.event')->middleware('auth');

// friends page
Route::resource('friends', FriendController::class)->middleware('auth');
// frined invitation
Route::post('/invite-friend', [FriendController::class, 'inviteFriend'])->name('invite.friend')->middleware('auth');
Route::get('/accept-invitation/{email}/{id}', [FriendController::class, 'acceptInvitation'])->name('accept.invitation');

//user favourite 
Route::get('/favourites', [FavouriteController::class, 'index'])->name('favourites.index')->middleware('auth');
Route::post('/favourites', [FavouriteController::class, 'store'])->name('favourites.store')->middleware('auth');

// comments for user
Route::post('/commentdata',[CommentController::class,'comment'])->name('comment.data')->middleware('auth');
Route::post('/comments',[CommentController::class,'store'])->name('comments.store')->middleware('auth');

// comments for admin
Route::get('/comments', [CommentController::class, 'index'])->name('comments.index')->middleware('auth','isAdmin');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware('auth','isAdmin');

//user profile
Route::get('/profiles',[ProfileController::class,'index'])->name('profiles.index')->middleware('auth');
Route::patch('/profiles/update/{id}',[ProfileController::class,'update'])->name('profiles.update')->middleware('auth');
Route::post('/changepassword',[ProfileController::class,'password'])->name('change.password')->middleware('auth');

//user page
Route::get('/profiles/page',[PageController::class,'profile'])->name('profiles.page')->middleware('auth');
Route::get('/favourites/page',[PageController::class,'favourite'])->name('favourities.page')->middleware('auth');

//admin users 
Route::resource('users',UserController::class)->middleware('auth','isAdmin'); 

// blogs
Route::get('/blog-page',[BLogController::class,'blog_page'])->name('blog.page')->middleware('auth');
Route::resource('blogs', BlogController::class)->middleware('auth','isAdmin');
 

require __DIR__.'/auth.php';
