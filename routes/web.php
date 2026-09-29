<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//route untuk user
Route::get('/',[ProductController::class,'home'])->name('home');
Route::get('/katalog',[ProductController::class,'index'])->name('katalog.index');
Route::get('/katalog/{id}',[ProductController::class,'show'])->name('katalog.show');

//route untuk login/logout
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.proses');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

//route untuk admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin',[ProductController::class, 'adminIndex'])->name('admin.index');
    Route::get('/admin/{id}/show', [ProductController::class, 'adminShow'])->name('admin.show');
    Route::get('/admin/create',[ProductController::class, 'create'])->name('admin.create');
    Route::post('/admin/store',[ProductController::class,'store'])->name('admin.store');
    Route::get('/admin/{id}/edit',[ProductController::class,'edit'])->name('admin.edit');
    Route::put('/admin/{id}/update',[ProductController::class,'update'])->name('admin.update');
    Route::delete('/admin/{id}/delete',[ProductController::class,'destroy'])->name('admin.destroy');
});


