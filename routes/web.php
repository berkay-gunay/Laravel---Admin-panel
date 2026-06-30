<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;




Route::get('/admin', [ProductController::class, 'create'])->name('admin.urun.ekle');
Route::get('/admin/urun-listesi', [ProductController::class, 'list_products'])->name('admin.urun.listesi');

Route::delete('/admin/urun-sil/{id}', [ProductController::class, 'destroy'])->name('admin.urun.sil');

 
Route::post('/admin/urun-kaydet', [ProductController::class, 'store'])->name('admin.urun.kaydet');