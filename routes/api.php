<?php

use App\Http\Controllers\APIRamController;
use App\Http\Controllers\APIYeuThichController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIDienThoaiController;
use App\Http\Controllers\APIKhachHangController;
use App\Http\Controllers\APIMauSacController;
use App\Http\Controllers\APINhaSanXuatController;
use App\Http\Controllers\APIBannerController;
use App\Http\Controllers\APIGioHangController;
use App\Http\Controllers\APIDienThoaiThongSoController;
use App\Http\Controllers\APIDungLuongController;
use App\Http\Controllers\APIPhieuXuatController;
use App\Http\Controllers\ThanhToanController;
use App\Http\Controllers\APIDanhGiaController;
use App\Http\Controllers\APIBinhLuanController;
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
Route::get('/dien-thoai-lien-quan', [APIDienThoaiController::class, 'dienThoaiLienQuan']);
// Route::get('/dien-thoai-theo-gia', [APIDienThoaiController::class, 'danhSachTheoGia'])->name('dien-thoai.danh-sach-theo-gia');
// Route::get('/dien-thoai-theo-gia-mau', [APIDienThoaiController::class, 'danhSachTheoGiaMau'])->name('dien-thoai.danh-sach-theo-gia-mau');
// Route::get('/dien-thoai-theo-gia-mau-dung-luong', [APIDienThoaiController::class, 'danhSachTheoGiaMauDungLuong'])->name('dien-thoai.danh-sach-theo-gia-mau-dung-luong');
// Route::get('/dien-thoai-theo-gia-mau-dung-luong-hang', [APIDienThoaiController::class, 'danhSachTheoGiaMauDungLuongHang'])->name('dien-thoai.danh-sach-theo-gia-mau-dung-luong-hang');
Route::get('/dien-thoai-duoc-danh-gia-nhieu-nhat', [APIDienThoaiController::class, 'dienThoaiDuocDanhGiaNhieuNhat']);
Route::get('/dien-thoai-luot-mua-nhieu-nhat', [APIDienThoaiController::class, 'dienThoaiLuotMuaNhieuNhat']);
Route::get('/dien-thoai-moi-nhat', [APIDienThoaiController::class, 'dienThoaiMoiNhat']);
Route::get('/chi-tiet-dien-thoai', [APIDienThoaiController::class, 'chiTietDienThoai']);

Route::middleware(['api'])->group(function () {
    Route::prefix('khach-hang')->group(function () {
        Route::post('/dang-nhap',[APIKhachHangController::class,'login']);
        Route::get('/thong-tin', [APIKhachHangController::class,'me']);
        Route::post('/dang-xuat', [APIKhachHangController::class,'logout']);

        Route::post('/dang-ky', [APIKhachHangController::class, 'dangKy']);
        Route::post('/xac-thuc-dang-ky', [APIKhachHangController::class, 'xacThucDangKy']);

        Route::get('/danh-sach-gio-hang', [APIGioHangController::class,'danhSachGioHangKhachHang']);
        Route::post('/cap-nhat-gio-hang', [APIGioHangController::class,'capNhatSoLuongGioHang']);
        Route::post('/xoa-gio-hang', [APIGioHangController::class,'xoaGioHang']);
        Route::post('/gio-hang-them-moi', [APIGioHangController::class,'themMoi']);

        Route::get('/danh-sach-yeu-thich', [APIYeuThichController::class,'danhSachYeuThichKhachHang']);
        Route::post('/xoa-yeu-thich', [APIYeuThichController::class,'xoaYeuThich']);
        Route::post('/yeu-thich-them-moi', [APIYeuThichController::class,'themMoi']);

        Route::post('/doi-mat-khau', [APIKhachHangController::class, 'doiMatKhau']);

        Route::post('/cap-nhat-mat-khau', [APIKhachHangController::class, 'quenMatKhau']);

        Route::post('/cap-nhat-thong-tin', [APIKhachHangController::class, 'capNhat']);

        Route::get('/don-hang', [APIKhachHangController::class, 'donHang']);

        Route::get('/xet-don-hang-da-mua', [APIPhieuXuatController::class, 'xetDonHangDaMua']);


        //đăng ký mail
        // Route::get('/mail-xac-nhan-dang-ky',[APIKhachHangController::class,'mail']);

    });
});
Route::get('/danh-sach-binh-luan', [APIBinhLuanController::class, 'danhSach']);

Route::post('/them-moi-binh-luan-cap-mot', [APIBinhLuanController::class, 'themMoiCapMot']);

Route::post('/them-moi-binh-luan-cap-hai', [APIBinhLuanController::class, 'themMoiCapHai']);

Route::get('/danh-sach-danh-gia', [APIDanhGiaController::class, 'danhSach']);

Route::get('/so-sao-danh-gia-trung-binh', [APIDanhGiaController::class, 'soSaoTrungBinhDienThoai']);

Route::post('/them-moi-danh-gia', [APIDanhGiaController::class, 'themMoi']);

Route::get('/mau-sac', [APIMauSacController::class, 'danhSach'])->name('mau-sac.danh-sach');

Route::get('/dung-luong', [APIDungLuongController::class, 'danhSach'])->name('dung-luong.danh-sach');

Route::get('/ram', [APIRamController::class, 'danhSach'])->name('ram.danh-sach');
//nha san xuat

Route::get('/nha-san-xuat', [APINhaSanXuatController::class, 'danhSach'])->name('nha-san-xuat.danh-sach');

//banner

Route::get('/banner', [APIBannerController::class, 'danhSach'])->name('banner.danh-sach');

//thong_So

Route::get('/thong-so/{id}', [APIDienThoaiThongSoController::class, 'thongSoTheoDienThoai']);

//phieu xuat

Route::post('/phieu-xuat/them-moi', [APIPhieuXuatController::class, 'themMoi']);

Route::post('phieu-xuat/cap-nhap-trang-thai', [APIPhieuXuatController::class, 'thayDoiTrangThai']);

Route::post('/phieu-xuat/huy-don', [APIPhieuXuatController::class, 'huyDon']);


//test thanh toan vnpay
//Route::get('/views-thanh-toan-vnpay',[ThanhToanController::class,'views'])->name('views-vnpay');
Route::post('/thanh-toan-vnpay',[ThanhToanController::class,'thanhToanVNPAY'])->name('vnpay');

