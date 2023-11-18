<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CameraSauController;
use App\Http\Controllers\CameraTruocController;
use App\Http\Controllers\DienThoaiController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\BoNhoTrongController;
use App\Http\Controllers\CongSacController;
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


//camera truoc
Route::get('/camera-truoc/danh-sach',[CameraTruocController::class,'danhSach'])->name('camera-truoc.danh-sach');
Route::get('/camera-truoc/them-moi',[CameraTruocController::class,'themMoi'])->name('camera-truoc.them-moi');
Route::post('/camera-truoc/them-moi',[CameraTruocController::class,'xuLyThemMoi'])->name('camera-truoc.xu-ly-them-moi');
Route::get('/camera-truoc/cap-nhat{id}',[CameraTruocController::class,'capNhat'])->name('camera-truoc.cap-nhat');
Route::post('/camera-truoc/cap-nhat{id}',[CameraTruocController::class,'xuLyCapNhat'])->name('camera-truoc.xu-ly-cap-nhat');
Route::get('/camera-truoc/xoa{id}',[CameraTruocController::class,'xoa'])->name('camera-truoc.xoa');


//chipset








//cong nghe mang hinh








//cong sac
Route::get('/cong-sac/danh-sach',[CongSacController::class,'danhSach'])->name('cong-sac.danh-sach');
Route::get('/cong-sac/them-moi',[CongSacController::class,'themMoi'])->name('cong-sac.them-moi');
Route::post('/cong-sac/them-moi',[CongSacController::class,'xuLyThemMoi'])->name('cong-sac.xu-ly-them-moi');
Route::get('/cong-sac/cap-nhat/{id}',[CongSacController::class,'capNhat'])->name('cong-sac.cap-nhat');
Route::post('/cong-sac/cap-nhat/{id}',[CongSacController::class,'xuLyCapNhat'])->name('cong-sac.xu-ly-cap-nhat');
Route::post('/cong-sac/xoa/{id}',[CongSacController::class,'xoa'])->name('cong-sac.xoa');








//do phan giai mang hinh








//dung luong ram








//he dieu hanh








//khang nuoc








//the sim








//pin








//tinh nang mang hinh








//mau
