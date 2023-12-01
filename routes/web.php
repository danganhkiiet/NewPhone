<?php
use App\Http\Controllers\DungLuongController;
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
    Route::prefix('dien-thoai')->group(function () {
        Route::name('dien-thoai.')->group(function () {
            Route::get('/danh-sach', [DienThoaiController::class, 'danHSach'])->name('danh-sach');
            Route::get('/them-moi', [DienThoaiController::class, 'themMoi'])->name('them-moi');
            Route::post('/them-moi', [DienThoaiController::class, 'xuLyThemMoi'])->name('xu-ly-them-moi');
            Route::get('/cap-nhat{id}', [DienThoaiController::class, 'capNhat'])->name('cap-nhat');
        });
    });
});
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AdminController::class, 'dangNhap'])->name('admin.dang-nhap');
    Route::post('/', [AdminController::class, 'xuLyDangNhap'])->name('admin.xu-ly-dang-nhap');
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
    Route::get('/dang-xuat', [AdminController::class, 'dangXuat'])->name('admin.dangxuat');
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
            Route::get('/cap-nhat/{id}',[KhachHangController::class,'capNhat'])->name('cap-nhat');
            Route::post('/cap-nhat/{id}',[KhachHangController::class,'xuLyCapNhat'])->name('xu-ly-cap-nhat');
            Route::get('/xoa{id}',[KhachHangController::class,'xoa'])->name('xoa');
        });
    });
});

//thong so
Route::middleware(['auth'])->group(function () {
    Route::prefix('thong-so')->group(function () {
        Route::name('thong-so.')->group(function () {
            Route::get('/danh-sach',[ThongSoController::class,'danhSach'])->name('danh-sach');
            Route::post('/them-moi',[ThongSoController::class,'themMoi'])->name('them-moi');
            Route::get('/cap-nhat/{id}',[ThongSoController::class,'capNhat'])->name('cap-nhat');
            // Route::post('/cap-nhat',[ThongSoController::class,'xuLyCapNhat'])->name('xu-ly-cap-nhat');
            Route::get('/xoa/{id}',[ThongSoController::class,'xoa'])->name('xoa');
            Route::post('/them-moi-cap-nhat',[ThongSoController::class,'themMoiVaCapNhat'])->name('them-moi-cap-nhap');
        });
    });
});
//Quản trị viên
Route::middleware(['auth'])->group(function () {
    Route::prefix('quan-tri-vien')->group(function () {
        Route::name('quan-tri-vien.')->group(function () {
            Route::get('/danh-sach',[AdminController::class,'danhSach'])->name('danh-sach');
            Route::get('/cap-nhat/{id}',[AdminController::class,'capNhat'])->name('cap-nhat');
            Route::post('/them-moi-cap-nhat',[AdminController::class,'themMoiVaCapNhat'])->name('them-moi-cap-nhat');
            Route::post('/xoa/{id}',[AdminController::class,'xoa'])->name('xoa');
        });
    });
});



//Nhà Sản Xuất
Route::middleware(['auth'])->group(function () {
    Route::prefix('nha-san-xuat')->group(function () {
        Route::name('nha-san-xuat.')->group(function () {
            Route::get('/danh-sach',[NhaSanXuatController::class,'danhSach'])->name('danh-sach');
            Route::get('/cap-nhat/{id}',[NhaSanXuatController::class,'capNhat'])->name('cap-nhat');
            Route::post('/them-moi-cap-nhat',[NhaSanXuatController::class,'themMoiVaCapNhat'])->name('xu-ly-them-moi-cap-nhat');
        });
    });
});
//Màu
Route::middleware(['auth'])->group(function () {
    Route::prefix('mau-sac')->group(function () {
        Route::name('mau-sac.')->group(function () {
            Route::get('/danh-sach',[MauController::class,'danhSach'])->name('danh-sach');
            Route::get('/cap-nhat/{id}',[MauController::class,'capNhat'])->name('cap-nhat');
            Route::post('/them-moi-cap-nhat',[MauController::class,'themMoiVaCapNhat'])->name('xu-ly-them-moi-cap-nhat');
        });
    });
});
//Dung Lượng
Route::get('/dung-luong/danh-sach',[DungLuongController::class,'danhSach'])->name('dung-luong.danh-sach');
Route::post('/dung-luong/them-moi',[DungLuongController::class,'themMoi'])->name('dung-luong.them-moi');
Route::get('/dung-luong/cap-nhat/{id}',[DungLuongController::class,'capNhat'])->name('dung-luong.cap-nhat');
Route::post('/dung-luong/cap-nhat',[DungLuongController::class,'xuLyCapNhat'])->name('dung-luong.xu-ly-cap-nhat');
Route::post('/dung-luong/xoa/{id}',[DungLuongController::class,'xoa'])->name('dung-luong.xoa');

