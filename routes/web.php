<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\CommentController as CommentControllerClient;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Admin\OrderController as OrderControllerPanel;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\ProductController as ProductControllerIndex;
use App\Http\Middleware\CheckPermission;

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




Route::prefix('')->name('client.')->group(function()
{

    Route::get('/',[HomeController::class , 'index'])->name('index');

    Route::get('/products/{Category}', [ProductControllerIndex::class , 'index'])->name('product.index');
    Route::get('/product/{product}', [ProductControllerIndex::class , 'show'])->name('product.show');

    Route::middleware('guest')->get('/register',[RegisterController::class,'create'])->name('register');
    Route::middleware('guest')->post('/register/sendmail',[RegisterController::class,'sendMail'])->name('register.sendMail');    
    Route::middleware('guest')->get('/register/otp/{user}',[RegisterController::class,'otp'])->name('register.otp');
    Route::middleware('guest')->post('/register/verifyOtp/{user}',[RegisterController::class,'verifyOtp'])->name('register.verifyOtp');
    Route::delete('/logout',[RegisterController::class,'logout'])->name('logout');

    Route::middleware('guest')->get('/login', [RegisterController::class , 'indexLogin'])->name('indexLogin');
    Route::middleware('guest')->post('/login', [RegisterController::class , 'login'])->name('login');

    Route::middleware('guest')->get('/login/forgot', [RegisterController::class , 'forgot'])->name('login.forgot');
    Route::middleware('guest')->post('/login/forgotPass', [RegisterController::class , 'forgotPass'])->name('login.forgotPass');
    Route::middleware('guest')->get('/login/forgotPassCode/{user}', [RegisterController::class , 'forgotPassCodeGet'])->name('login.forgotPassCodeGet');
    Route::middleware('guest')->post('/login/forgotPassCode/{user}', [RegisterController::class , 'forgotPassCode'])->name('login.forgotPassCode');

    Route::middleware('guest')->get('/login/setPass/{user}', [RegisterController::class , 'setPassGet'])->name('login.setPassGet');
    Route::middleware('guest')->post('/login/setPass/{user}', [RegisterController::class , 'setPass'])->name('login.setPass');

    Route::post('/comment/{product}', [CommentControllerClient::class , 'store'])->name('comment.store');



    Route::post('/cart/{product}', [CartController::class,'store'])->name('cart.store');
    Route::delete('/cart/{product}', [CartController::class,'destroy'])->name('cart.delete');
    Route::get('/cart', [CartController::class,'index'])->name('cart.index');

    Route::middleware('auth')->post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::middleware('auth')->get('/order/payment/callback', [OrderController::class, 'callback'])->name('order.callback');
    Route::middleware('auth')->get('/order/{order}', [OrderController::class,'show'])->name('order.show');


});



Route::middleware('auth' ,CheckPermission::class . ':view-dashbord')->prefix('/adminpanel')->name('admin.')->group(function()
{
    
    Route::get('/', [PanelController::class , 'index'])->name('index');

    Route::resource('category', CategoryController::class);
    Route::post('/category/store', [CategoryController::class , 'storeSub'])->name('category.storeSub');

    Route::resource('product', ProductController::class);

    Route::post('/product/search/', [ProductController::class , 'search'])->name('cat.search');

    Route::get('/user', [UserController::class , 'index'])->name('user.index');
    Route::post('/user', [UserController::class , 'store'])->name('user.store');
    Route::get('/user/create', [UserController::class , 'create'])->name('user.create');
    Route::delete('/user/{user}', [UserController::class , 'destroy'])->name('user.destroy');

    Route::get('/comment', [CommentController::class , 'index'])->name('comment.index');
    Route::delete('/comment/{comment}', [CommentController::class , 'destroy'])->name('comment.destroy');
    Route::patch('/comment/{comment}', [CommentController::class , 'update'])->name('comment.update');

    // Route::get('/role/create', [RoleController::class,'create'])->name('role.create');
    // Route::post('/role/', [RoleController::class,'store'])->name('role.store');
    // Route::delete('/role/{role}', [RoleController::class,'destroy'])->name('role.destroy');
    // Route::get('/role/edit/{role}', [RoleController::class,'edit'])->name('role.store');

    Route::resource('role', RoleController::class);


    Route::middleware('auth')->get('/order', [OrderControllerPanel::class, 'index'])->name('order.index');


});