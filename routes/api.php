<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIDienThoaiController;
use App\Http\Controllers\APIKhachHangController;
use App\Http\Controllers\APIMauSacController;
use App\Http\Controllers\APINhaSanXuatController;
use App\Http\Controllers\APIBannerController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/dien-thoai', [APIDienThoaiController::class, 'danhSach'])->name('dien-thoai.danh-sach');
Route::get('/dien-thoai-chi-tiet/{id}', [APIDienThoaiController::class, 'danhSachChiTiet'])->name('dien-thoai.danh-sach-chi-tiet');
Route::get('/dien-thoai-loc-danh-sach', [APIDienThoaiController::class, 'danhSachLoc'])->name('dien-thoai.danh-sach-loc');
// Route::get('/dien-thoai-theo-gia', [APIDienThoaiController::class, 'danhSachTheoGia'])->name('dien-thoai.danh-sach-theo-gia');
// Route::get('/dien-thoai-theo-gia-mau', [APIDienThoaiController::class, 'danhSachTheoGiaMau'])->name('dien-thoai.danh-sach-theo-gia-mau');
// Route::get('/dien-thoai-theo-gia-mau-dung-luong', [APIDienThoaiController::class, 'danhSachTheoGiaMauDungLuong'])->name('dien-thoai.danh-sach-theo-gia-mau-dung-luong');
// Route::get('/dien-thoai-theo-gia-mau-dung-luong-hang', [APIDienThoaiController::class, 'danhSachTheoGiaMauDungLuongHang'])->name('dien-thoai.danh-sach-theo-gia-mau-dung-luong-hang');


Route::post('/khach-hang/dang-ky', [APIKhachHangController::class, 'dangKy'])->name('khach-hang.dang-ky');

Route::middleware(['api'])->group(function () {
    Route::prefix('khach-hang')->group(function () {
        Route::post('/dang-nhap',[APIKhachHangController::class,'login']);
        Route::post('/dang-xuat', [APIKhachHangController::class,'logout']);
    });
});

Route::get('/mau-sac', [APIMauSacController::class, 'danhSach'])->name('mau-sac.danh-sach');

//nha san xuat

Route::get('/nha-san-xuat', [APINhaSanXuatController::class, 'danhSach'])->name('nha-san-xuat.danh-sach');

//banner

Route::get('/banner', [APIBannerController::class, 'danhSach'])->name('banner.danh-sach');