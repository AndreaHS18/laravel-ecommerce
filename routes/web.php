<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/principal', [HomeController::class, 'principal']);

Route::get('/productos', [HomeController::class, 'productos']);

Route::get('/', [HomeController::class, 'index']);

Route::post('/addCart/{id}', [HomeController::class, 'addCart']);

Route::get('/showCart', [HomeController::class, 'showCart']);

Route::get('/deleteProductCart/{id}', [HomeController::class, 'deleteProductCart']);

Route::post('/confirmOrden', [HomeController::class, 'confirmOrden']);

Route::get('/perfil', [HomeController::class, 'perfil']);

Route::get('/updateInfo/{id}', [HomeController::class, 'updateInfo']);

Route::post('/updateInfo2/{id}', [HomeController::class, 'updateInfo2']);

Route::get('/pdf/{id}', [HomeController::class, 'pdf']);




Route::get('/product', [AdminController::class, 'product']);

Route::get('/showProduct', [AdminController::class, 'showProduct']);

Route::post('/uploadProduct', [AdminController::class, 'uploadProduct']);

Route::get('/deleteProduct/{id}', [AdminController::class, 'deleteProduct']);

Route::get('/updateView/{id}', [AdminController::class, 'updateView']);

Route::post('/updateProduct/{id}', [AdminController::class, 'updateProduct']);

Route::get('/showOrder', [AdminController::class, 'showOrder']);

Route::get('/updateStatus/{id}', [AdminController::class, 'updateStatus']);
