<?php
use App\Http\Controllers\MauController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DienThoaiController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\ThongSoController;


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
Route::get('/',[NhaCungCapController::class,'danhSach'])->name('dien-thoai.danh-sach');











//nhacungcap
Route::get('/nha-cung-cap/danh-sach',[NhaCungCapController::class,'danhSach'])->name('nha-cung-cap.danh-sach');
Route::get('/nha-cung-cap/them-moi',[NhaCungCapController::class,'themMoi'])->name('nha-cung-cap.them-moi');
Route::post('/nha-cung-cap/them-moi',[NhaCungCapController::class,'xuLyThemMoi'])->name('nha-cung-cap.xu-ly-them-moi');
Route::get('/nha-cung-cap/cap-nhat/{id}',[NhaCungCapController::class,'capNhat'])->name('nha-cung-cap.cap-nhat');
Route::post('/nha-cung-cap/cap-nhat/{id}',[NhaCungCapController::class,'xuLyCapNhat'])->name('nha-cung-cap.xu-ly-cap-nhat');
Route::post('/nha-cung-cap/xoa/{id}',[NhaCungCapController::class,'xoa'])->name('nha-cung-cap.xoa');








//khachhang
Route::get('/khach-hang/danh-sach',[KhachHangController::class,'danhSach'])->name('khach-hang.danh-sach');
Route::get('/khach-hang/them-moi',[KhachHangController::class,'themMoi'])->name('khach-hang.them-moi');
Route::post('/khach-hang/them-moi',[KhachHangController::class,'xuLyThemMoi'])->name('khach-hang.xu-ly-them-moi');
Route::get('/khach-hang/cap-nhat{id}',[KhachHangController::class,'capNhat'])->name('khach-hang.cap-nhat');
Route::post('/khach-hang/cap-nhat{id}',[KhachHangController::class,'xuLyCapNhat'])->name('khach-hang.xu-ly-cap-nhat');
Route::get('/khach-hang/xoa{id}',[KhachHangController::class,'xoa'])->name('khach-hang.xoa');


//thong so
Route::get('/thong-so/danh-sach',[ThongSoController::class,'danhSach'])->name('thong-so.danh-sach');
Route::get('/thong-so/them-moi',[ThongSoController::class,'themMoi'])->name('thong-so.them-moi');
Route::post('/thong-so/them-moi',[ThongSoController::class,'xuLyThemMoi'])->name('thong-so.xu-ly-them-moi');
Route::get('/thong-so/cap-nhat/{id}',[ThongSoController::class,'capNhat'])->name('thong-so.cap-nhat');
Route::post('/thong-so/cap-nhat/{id}',[ThongSoController::class,'xuLyCapNhat'])->name('thong-so.xu-ly-cap-nhat');
Route::get('/thong-so/xoa/{id}',[ThongSoController::class,'xoa'])->name('thong-so.xoa');







//dien thoai








