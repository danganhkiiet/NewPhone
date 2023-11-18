<?php

use App\Http\Controllers\CameraSauController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DienThoaiController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\BoNhoTrongController;
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

//bo nho trong
Route::get('/bo-nho-trong/danh-sach',[BoNhoTrongController::class,'danhSach'])->name('bo-nho-trong.danh-sach');
Route::get('/bo-nho-trong/them-moi',[BoNhoTrongController::class,'themMoi'])->name('bo-nho-trong.them-moi');
Route::post('/bo-nho-trong/them-moi',[BoNhoTrongController::class,'xuLyThemMoi'])->name('bo-nho-trong.xu-ly-them-moi');
Route::get('/bo-nho-trong/cap-nhat{id}',[BoNhoTrongController::class,'capNhat'])->name('bo-nho-trong.cap-nhat');
Route::post('/bo-nho-trong/cap-nhat{id}',[BoNhoTrongController::class,'xuLyCapNhat'])->name('bo-nho-trong.xu-ly-cap-nhat');
Route::get('/bo-nho-trong/xoa{id}',[BoNhoTrongController::class,'xoa'])->name('bo-nho-trong.xoa');

//camera sau
Route::get('/camera-sau/danh-sach',[CameraSauController::class,'danhSach'])->name('camera-sau.danh-sach');
Route::get('/camera-sau/them-moi',[CameraSauController::class,'themMoi'])->name('camera-sau.them-moi');
Route::post('/camera-sau/them-moi',[CameraSauController::class,'xuLyThemMoi'])->name('camera-sau.xu-ly-them-moi');
Route::get('/camera-sau/cap-nhat{id}',[CameraSauController::class,'capNhat'])->name('camera-sau.cap-nhat');
Route::post('/camera-sau/cap-nhat{id}',[CameraSauController::class,'xuLyCapNhat'])->name('camera-sau.xu-ly-cap-nhat');
Route::get('/camera-sau/xoa{id}',[CameraSauController::class,'xoa'])->name('camera-sau.xoa');