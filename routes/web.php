<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{AuthController, ProductController};


Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
});


Route::middleware('auth')->group(function () {
    
    
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    
    Route::get('/admin/urun-ekle', [ProductController::class, 'create'])->name('admin.urun.ekle');
    Route::post('/admin/urun-kaydet', [ProductController::class, 'store'])->name('admin.urun.kaydet');
    Route::get('/admin/urun-listesi', [ProductController::class, 'list_products'])->name('admin.urun.listesi');
    Route::delete('/admin/urun-sil/{id}', [ProductController::class, 'destroy'])->name('admin.urun.sil');
    
    Route::get('/admin/urun-duzenle/{id}', [ProductController::class, 'edit'])->name('admin.urun.duzenle');
    Route::put('/admin/urun-guncelle/{id}', [ProductController::class, 'update'])->name('admin.urun.guncelle');
});