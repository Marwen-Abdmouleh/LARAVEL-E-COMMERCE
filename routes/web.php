<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ClientProduitController;
use App\Http\Controllers\Front\ContactController;




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

// Admin

Route::middleware(['auth','role:admin'])->group(function(){
    Route::resource('/produits',ProduitController::class);
    Route::resource('/categories',CategoryController::class);
});

//User
Route::middleware('auth')->group(function(){
    Route::get('/', [HomController::class ,'welcome' ])->name('welcome');
    Route::get('/presentation', [HomController::class ,'presentation' ])->name('presentation');
    Route::get('front/produits/{cat}',[ClientProduitController::class,'index'])->name('Front.produit');
    

// panier
Route::post('/panier/ajouter',[CartController::class,'store'])->name('cart.store');
Route::get('/panier',[CartController::class,'index'])->name('cart.index');
Route::delete('/panier/{rowId}',[CartController::class,'destroy'])->name('cart.destroy');
Route::post('/panier/update',[CartController::class,'update'])->name('cart.update');

//Mail
Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::post('/sendmail',[ContactController::class,'sendEmail'])->name('sendEmail');



});



// auth
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


