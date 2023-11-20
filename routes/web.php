<?php
use App\Http\Controllers\MauController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DienThoaiController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\ThongSoController;
use App\Http\Controllers\AdminController;

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
    Route::get('/dang-xuat', [AdminController::class, 'dangXuat'])->name('admin.dangxuat');
});
Route::middleware(['guest'])->group(function () {
    Route::get('/dang-nhap', [AdminController::class, 'dangNhap'])->name('admin.dang-nhap');
    Route::post('/dang-nhap', [AdminController::class, 'xuLyDangNhap'])->name('admin.xu-ly-dang-nhap');
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






//dien thoai








