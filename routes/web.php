<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembelianController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('data/barang', BarangController::class);

Route::get('data/barang/cetak_pdf', [BarangController::class , 'cetak_pdf'])->name('cetak_pdf');
// Route::get('data/barang/cetak_pdf', [BarangController::class , 'cetak']);

Route::resource('data/supplier', SupplierController::class);

Route::resource('data/karyawan', KaryawanController::class);

Route::resource('data/pelanggan', PelangganController::class);

Route::resource('transaksi/penjualan', PenjualanController::class);

Route::get('data/transaksi/cetak_pdf', [PenjualanController::class , 'cetak_pdf'])->name('cetak_pdf');
// Route::get('data/barang/cetak_pdf', [BarangController::class , 'cetak']);

Route::resource('transaksi/pembelian', PembelianController::class);

Route::get('data/transaksi/cetak_pdf', [PembelianController::class , 'cetak_pdf'])->name('cetak_pdf');
