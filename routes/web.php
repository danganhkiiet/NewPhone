<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DungLuongController;
use App\Http\Controllers\MauSacController;
use App\Http\Controllers\DienThoaiController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\ThongSoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PhieuNhapController;
use App\Http\Controllers\PhieuXuatController;
use App\Http\Controllers\NhaSanXuatController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ThanhToanController;
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

            Route::get('/danh-sach', [DienThoaiController::class, 'danhSach'])->name('danh-sach');
            Route::get('/danh-sach-da-xoa', [DienThoaiController::class, 'danhSachDaXoa'])->name('danh-sach-da-xoa');
            Route::get('/chi-tiet/{id}', [DienThoaiController::class, 'chiTietDienThoai'])->name('xem-chi-tiet');

            Route::get('/them-moi', [DienThoaiController::class, 'themMoi'])->name('them-moi');
            Route::post('/them-moi', [DienThoaiController::class, 'xuLyThemMoi'])->name('xu-ly-them-moi');

            Route::get('/cap-nhat{id}', [DienThoaiController::class, 'capNhat'])->name('cap-nhat');
            Route::post('/cap-nhat{id}', [DienThoaiController::class, 'xuLyCapNhat'])->name('xu-ly-cap-nhat');

            Route::get('/kiem-tra-ton-tai', [DienThoaiController::class, 'kiemTraTonTai'])->name('kiem-tra-ton-tai');

            Route::POST('/xoa/{id}', [DienThoaiController::class, 'xoa'])->name('xoa');
            Route::POST('/restore/{id}', [DienThoaiController::class, 'restore'])->name('restore');

            Route::post('/them-hinh-anh', [DienThoaiController::class, 'themHinhAnh'])->name('them-hinh-anh');
            Route::post('/xoa-hinh-anh', [DienThoaiController::class, 'xoaHinhAnh'])->name('xoa-hinh-anh');

            Route::post('/mo-ta/{id}', [DienThoaiController::class, 'capNhatMota'])->name('cap-nhat-mo-ta');

         
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
            Route::get('/xem-chi-tiet/{id}',[PhieuNhapController::class,'chiTietPhieuNhap'])->name('xem-chi-tiet');
            Route::get('/them-moi-phieu-nhap',[PhieuNhapController::class,'themMoi'])->name('them-moi-phieu-nhap');
            Route::post('/them-moi-phieu-nhap',[PhieuNhapController::class,'xuLyThemMoi'])->name('xu-ly-them-moi');
            Route::get('/them-moi-dien-thoai',[PhieuNhapController::class,'themMoiDienThoai'])->name('them-moi-dien-thoai');
            Route::post('/them-moi-dien-thoai',[PhieuNhapController::class,'xuLyThemMoiDienThoai'])->name('xu-ly-them-moi-dien-thoai');
            Route::get('/danh-sach-dien-thoai-theo-nha-san-xuat',[PhieuNhapController::class,'danhSachDienThoaiTheoNhaSanXuat'])->name('danh-sach-dien-thoai-theo-nha-san-xuat');
            Route::get('/danh-sach-chi-tiet-dien-thoai-theo-dien-thoai',[PhieuNhapController::class,'danhSachChiTietDienThoaiTheoDienThoai'])->name('danh-sach-chi-tiet-dien-thoai-theo-dien-thoai');
        });
    });
    Route::get('/phieu-xuat/danh-sach-da-xac-nhan',[PhieuXuatController::class,'danhSachDaXacNhan'])->name('phieu-xuat.danh-sach-da-xac-nhan');
    Route::get('/phieu-xuat/danh-sach-cho-xac-nhan',[PhieuXuatController::class,'danhSachChoXacNhan'])->name('phieu-xuat.danh-sach-cho-xac-nhan');
    Route::get('/phieu-xuat/danh-sach-van-chuyen',[PhieuXuatController::class,'danhSachVanChuyen'])->name('phieu-xuat.danh-sach-van-chuyen');
    Route::get('/phieu-xuat/danh-sach-da-huy',[PhieuXuatController::class,'danhSachDaHuy'])->name('phieu-xuat.danh-sach-da-huy');
    Route::get('/phieu-xuat/danh-sach-thanh-cong',[PhieuXuatController::class,'danhSacThanhCong'])->name('phieu-xuat.danh-sach-thanh-cong');
    Route::get('/phieu-xuat/danh-sach-chi-tiet/{id}',[PhieuXuatController::class,'danhSachChiTiet'])->name('phieu-xuat.danh-sach-chi-tiet');
    Route::post('/phieu-xuat/cap-nhat-cho-xac-nhan/{id}',[PhieuXuatController::class,'capNhatChoXacNhan'])->name('phieu-xuat.cap-nhat-cho-xac-nhan');
    Route::post('/phieu-xuat/cap-nhat-da-xac-nhan/{id}',[PhieuXuatController::class,'capNhatDaXacNhan'])->name('phieu-xuat.cap-nhat-da-xac-nhan');
    Route::post('/phieu-xuat/cap-nhat-phieu-van-chuyen/{id}',[PhieuXuatController::class,'capNhatPhieuVanChuyen'])->name('phieu-xuat.cap-nhat-phieu-van-chuyen');
    Route::get('/dang-xuat', [AdminController::class, 'dangXuat'])->name('admin.dangxuat');
});




//nhacungcap
Route::middleware(['auth'])->group(function () {
    Route::prefix('nha-cung-cap')->group(function () {
        Route::name('nha-cung-cap.')->group(function () {
            Route::get('/danh-sach',[NhaCungCapController::class,'danhSach'])->name('danh-sach');
            Route::get('/cap-nhat/{id}',[NhaCungCapController::class,'capNhat'])->name('cap-nhat');
            Route::post('/them-moi-cap-nhat',[NhaCungCapController::class,'themMoiVaCapNhat'])->name('xu-ly-them-moi-cap-nhat');
            // Route::post('/xoa/{id}',[NhaCungCapController::class,'xoa'])->name('xoa');
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
            Route::get('/xoa/{id}',[KhachHangController::class,'xoa'])->name('xoa');

         

        });
    });
});
Route::get('/cap-nhat-mat-khau/{token}', [KhachHangController::class, 'quenMatKhau'])->name('cap-nhat-mat-khau');
Route::post('/cap-nhat-mat-khau', [KhachHangController::class, 'xacThucCapNhatQuenMatKhau'])->name('xu-ly-cap-nhat-mat-khau');
Route::get('/cap-nhat-mat-khau-thanh-cong', [KhachHangController::class, 'quenMatKhauThanhCong'])->name('cap-nhat-mat-khau-thanh-cong');

//thong so
Route::middleware(['auth'])->group(function () {
    Route::prefix('thong-so')->group(function () {
        Route::name('thong-so.')->group(function () {
            Route::get('/danh-sach',[ThongSoController::class,'danhSach'])->name('danh-sach');
            Route::post('/them-moi',[ThongSoController::class,'themMoi'])->name('them-moi');
            Route::get('/cap-nhat/{id}',[ThongSoController::class,'capNhat'])->name('cap-nhat');
            Route::post('/them-moi-cap-nhat',[ThongSoController::class,'themMoiVaCapNhat'])->name('them-moi-cap-nhap');
            Route::get('/xoa/{id}',[ThongSoController::class,'xoa'])->name('xoa');
        });
    });
});
//Quản trị viên
Route::middleware(['auth'])->group(function () {
    Route::prefix('quan-tri-vien')->group(function () {
        Route::name('quan-tri-vien.')->group(function () {
            Route::get('/danh-sach',[AdminController::class,'danhSach'])->name('danh-sach');
            Route::post('/them-moi',[AdminController::class,'themMoi'])->name('them-moi');
            Route::get('/cap-nhat/{id}',[AdminController::class,'capNhat'])->name('cap-nhat');
            Route::post('/cap-nhat',[AdminController::class,'xuLyCapNhat'])->name('xu-ly-cap-nhat');
            Route::post('/xoa/{id}',[AdminController::class,'xoa'])->name('xoa');
            Route::get('/thong-tin-ca-nhan/{id}',[AdminController::class,'thongTinCaNhanQuanTriVien'])->name('thong-tin-ca-nhan');
            Route::post('/thong-tin-ca-nhan/{id}',[AdminController::class,'capNhatThongTinCaNhanQuanTriVien'])->name('xu-ly-cap-nhat-thong-tin-ca-nhan');
           
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
            Route::get('/danh-sach',[MauSacController::class,'danhSach'])->name('danh-sach');
            Route::get('/cap-nhat/{id}',[MauSacController::class,'capNhat'])->name('cap-nhat');
            Route::post('/them-moi-cap-nhat',[MauSacController::class,'themMoiVaCapNhat'])->name('xu-ly-them-moi-cap-nhat');
        });
    });
});
//Dung Lượng
Route::middleware(['auth'])->group(function () {
    Route::prefix('dung-luong')->group(function () {
        Route::name('dung-luong.')->group(function () {
            Route::get('/danh-sach',[DungLuongController::class,'danhSach'])->name('danh-sach');
            Route::get('/cap-nhat/{id}',[DungLuongController::class,'capNhat'])->name('cap-nhat');
            Route::post('/them-moi-cap-nhat',[DungLuongController::class,'themMoiVaCapNhat'])->name('xu-ly-them-moi-cap-nhat');

        });
    });
});

//Banner
Route::middleware(['auth'])->group(function () {
    Route::prefix('banner')->group(function () {
        Route::name('banner.')->group(function () {
            Route::get('/danh-sach',[BannerController::class,'danhSach'])->name('danh-sach');
            Route::get('/cap-nhat/{id}',[BannerController::class,'capNhat'])->name('cap-nhat');
            Route::post('/them-moi-cap-nhat',[BannerController::class,'themMoiVaCapNhat'])->name('xu-ly-them-moi-cap-nhat');
            Route::post('/xoa/{id}',[BannerController::class,'xoa'])->name('xoa');
        });
    });
});


