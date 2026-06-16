<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransaksiController;

// Jika CustomerController tidak dipakai lagi, baris ini bisa dihapus.
// Kalau masih dipakai, biarkan seperti ini:
Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{customer}', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customer/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');
Route::get('/customer/trash', [CustomerController::class, 'trash'])->name('customer.trash');
Route::put('/customer/{id}/restore', [CustomerController::class, 'restore'])->name('customer.restore');
Route::resource('member', MemberController::class);
Route::resource('transaksi', TransaksiController::class);
