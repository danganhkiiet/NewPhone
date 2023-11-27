<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MauController;
use App\Http\Controllers\DienThoaiController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\ThongSoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PhieuNhapController;
use App\Http\Controllers\NhaSanXuatController;

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
Route::middleware(['auth'])->group(function () {
    Route::get('/',[NhaCungCapController::class,'danhSach'])->name('dien-thoai.danh-sach');
    Route::get('/them-moi',[DienThoaiController::class,'themMoi'])->name('dien-thoai.them-moi');
    Route::get('/dang-xuat', [AdminController::class, 'dangXuat'])->name('admin.dangxuat');
});
Route::middleware(['guest'])->group(function () {
    Route::get('/dang-nhap', [AdminController::class, 'dangNhap'])->name('admin.dang-nhap');
    Route::post('/dang-nhap', [AdminController::class, 'xuLyDangNhap'])->name('admin.xu-ly-dang-nhap');
});



//phieu nhap
Route::middleware(['auth'])->group(function () {
    Route::prefix('phieu-nhap')->group(function () {
        Route::name('phieu-nhap.')->group(function () {
            Route::get('/danh-sach',[PhieuNhapController::class,'danhSach'])->name('danh-sach');
            Route::get('/xem-chi-tiet{id}',[PhieuNhapController::class,'chiTietPhieuNhap'])->name('xem-chi-tiet');
            Route::get('/them-moi-phieu-nhap',[PhieuNhapController::class,'themMoi'])->name('them-moi-phieu-nhap');
            Route::post('/them-moi-phieu-nhap',[PhieuNhapController::class,'xuLyThemMoi'])->name('xu-ly-them-moi');
            Route::get('/them-moi-dien-thoai',[PhieuNhapController::class,'themMoiDienThoai'])->name('them-moi-dien-thoai');
            Route::post('/them-moi-dien-thoai',[PhieuNhapController::class,'xuLyThemMoiDienThoai'])->name('xu-ly-them-moi-dien-thoai');
            Route::get('/danh-sach-dien-thoai-theo-nha-san-xuat',[PhieuNhapController::class,'danhSachDienThoaiTheoNhaSanXuat'])->name('danh-sach-dien-thoai-theo-nha-san-xuat');
        });
    });
});




//nhacungcap
Route::middleware(['auth'])->group(function () {
    Route::prefix('nha-cung-cap')->group(function () {
        Route::name('nha-cung-cap.')->group(function () {
            Route::get('/danh-sach',[NhaCungCapController::class,'danhSach'])->name('danh-sach');
            Route::get('/them-moi',[NhaCungCapController::class,'themMoi'])->name('them-moi');
            Route::post('/them-moi',[NhaCungCapController::class,'xuLyThemMoi'])->name('xu-ly-them-moi');
            Route::get('/cap-nhat/{id}',[NhaCungCapController::class,'capNhat'])->name('cap-nhat');
            Route::post('/cap-nhat/{id}',[NhaCungCapController::class,'xuLyCapNhat'])->name('xu-ly-cap-nhat');
            Route::post('/xoa/{id}',[NhaCungCapController::class,'xoa'])->name('xoa');
        });
    });
});







//khachhang
Route::middleware(['auth'])->group(function () {
    Route::prefix('khach-hang')->group(function () {
        Route::name('khach-hang.')->group(function () {
            Route::get('/danh-sach',[KhachHangController::class,'danhSach'])->name('danh-sach');
            Route::get('/them-moi',[KhachHangController::class,'themMoi'])->name('them-moi');
            Route::post('/them-moi',[KhachHangController::class,'xuLyThemMoi'])->name('xu-ly-them-moi');
            Route::get('/cap-nhat{id}',[KhachHangController::class,'capNhat'])->name('cap-nhat');
            Route::post('/cap-nhat{id}',[KhachHangController::class,'xuLyCapNhat'])->name('xu-ly-cap-nhat');
            Route::get('/xoa{id}',[KhachHangController::class,'xoa'])->name('xoa');
        });
    });
});

//thong so
Route::middleware(['auth'])->group(function () {
    Route::prefix('thong-so')->group(function () {
        Route::name('thong-so.')->group(function () {
            Route::get('/danh-sach',[ThongSoController::class,'danhSach'])->name('danh-sach');
            Route::get('/them-moi',[ThongSoController::class,'themMoi'])->name('them-moi');
            Route::post('/them-moi',[ThongSoController::class,'xuLyThemMoi'])->name('xu-ly-them-moi');
            Route::get('/cap-nhat/{id}',[ThongSoController::class,'capNhat'])->name('cap-nhat');
            Route::post('/cap-nhat/{id}',[ThongSoController::class,'xuLyCapNhat'])->name('xu-ly-cap-nhat');
            Route::get('/xoa/{id}',[ThongSoController::class,'xoa'])->name('xoa');
        });
    });
});
//tài khoản
Route::middleware(['auth'])->group(function () {
    Route::prefix('tai-khoan')->group(function () {
        Route::name('tai-khoan.')->group(function () {
            Route::get('/danh-sach',[AdminController::class,'danhSach'])->name('danh-sach');
            Route::get('/them-moi',[AdminController::class,'themMoi'])->name('them-moi');
            Route::post('/them-moi',[AdminController::class,'xuLyThemMoi'])->name('xu-ly-them-moi');
            Route::get('/cap-nhat/{id}',[AdminController::class,'capNhat'])->name('cap-nhat');
            Route::post('/cap-nhat/{id}',[AdminController::class,'xuLyCapNhat'])->name('xu-ly-cap-nhat');
            Route::post('/xoa/{id}',[AdminController::class,'xoa'])->name('xoa');
        });
    });
});



//Nhà Sản Xuất
Route::get('/nha-san-xuat/danh-sach',[NhaSanXuatController::class,'danhSach'])->name('nha-san-xuat.danh-sach');
Route::post('/nha-san-xuat/them-moi',[NhaSanXuatController::class,'themMoi'])->name('nha-san-xuat.them-moi');
Route::get('/nha-san-xuat/cap-nhat/{id}',[NhaSanXuatController::class,'capNhat'])->name('nha-san-xuat.cap-nhat');
Route::post('/nha-san-xuat/cap-nhat',[NhaSanXuatController::class,'xuLyCapNhat'])->name('nha-san-xuat.xu-ly-cap-nhat');

//Màu
Route::get('/mau-sac/danh-sach',[MauController::class,'danhSach'])->name('mau-sac.danh-sach');
Route::post('/mau-sac/them-moi',[MauController::class,'themMoi'])->name('mau-sac.them-moi');
Route::get('/mau-sac/cap-nhat/{id}',[MauController::class,'capNhat'])->name('mau-sac.cap-nhat');
Route::post('/mau-sac/cap-nhat',[MauController::class,'xuLyCapNhat'])->name('mau-sac.xu-ly-cap-nhat');
Route::post('/mau-sac/xoa/{id}',[MauController::class,'xoa'])->name('mau-sac.xoa');







