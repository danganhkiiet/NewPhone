<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DienThoaiController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\KhachHangController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//dien thoai
Route::get('/',[DienThoaiController::class,'danhSach'])->name('dien-thoai.danh-sach');

//nhacungcap
Route::get('/nha-cung-cap/danh-sach',[NhaCungCapController::class,'danhSach'])->name('nha-cung-cap.danh-sach');

//khachhang
Route::get('/khach-hang/danh-sach',[KhachHangController::class,'danhSach'])->name('khach-hang.danh-sach');
Route::get('/khach-hang/them-moi',[KhachHangController::class,'themMoi'])->name('khach-hang.them-moi');
Route::post('/khach-hang/them-moi',[KhachHangController::class,'xuLyThemMoi'])->name('khach-hang.xu-ly-them-moi');
Route::get('/khach-hang/cap-nhat{id}',[KhachHangController::class,'capNhat'])->name('khach-hang.cap-nhat');
Route::post('/khach-hang/cap-nhat{id}',[KhachHangController::class,'xuLyCapNhat'])->name('khach-hang.xu-ly-cap-nhat');
Route::get('/khach-hang/xoa{id}',[KhachHangController::class,'xoa'])->name('khach-hang.xoa');