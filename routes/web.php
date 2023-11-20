<?php
use App\Http\Controllers\KichThuocManHinhController;
use App\Http\Controllers\MauController;
use App\Http\Controllers\PinController;
use App\Http\Controllers\TheSimController;
use App\Http\Controllers\TinhNangManHinhController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CameraSauController;
use App\Http\Controllers\CameraTruocController;
use App\Http\Controllers\DienThoaiController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\BoNhoTrongController;
use App\Http\Controllers\ChipsetController;
use App\Http\Controllers\CongNgheManHinhController;
use App\Http\Controllers\CongSacController;
use App\Http\Controllers\DoPhanGiaiManHinhController;
use App\Http\Controllers\DungLuongRamController;
use App\Http\Controllers\HeDieuHanhController;
use App\Http\Controllers\KhangNuocController;

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
Route::get('/chipset/danh-sach',[ChipsetController::class,'danhSach'])->name('chipset.danh-sach');
Route::get('/chipset/them-moi',[ChipsetController::class,'themMoi'])->name('chipset.them-moi');
Route::post('/chipset/them-moi',[ChipsetController::class,'xuLyThemMoi'])->name('chipset.xu-ly-them-moi');
Route::get('/chipset/cap-nhat{id}',[ChipsetController::class,'capNhat'])->name('chipset.cap-nhat');
Route::post('/chipset/cap-nhat{id}',[ChipsetController::class,'xuLyCapNhat'])->name('chipset.xu-ly-cap-nhat');
Route::get('/chipset/xoa{id}',[ChipsetController::class,'xoa'])->name('chipset.xoa');







//cong nghe mang hinh
Route::get('/cong-nghe-man-hinh/danh-sach',[CongNgheManHinhController::class,'danhSach'])->name('cong-nghe-man-hinh.danh-sach');
Route::get('/cong-nghe-man-hinh/them-moi',[CongNgheManHinhController::class,'themMoi'])->name('cong-nghe-man-hinh.them-moi');
Route::post('/cong-nghe-man-hinh/them-moi',[CongNgheManHinhController::class,'xuLyThemMoi'])->name('cong-nghe-man-hinh.xu-ly-them-moi');
Route::get('/cong-nghe-man-hinh/cap-nhat{id}',[CongNgheManHinhController::class,'capNhat'])->name('cong-nghe-man-hinh.cap-nhat');
Route::post('/cong-nghe-man-hinh/cap-nhat{id}',[CongNgheManHinhController::class,'xuLyCapNhat'])->name('cong-nghe-man-hinh.xu-ly-cap-nhat');
Route::get('/cong-nghe-man-hinh/xoa{id}',[CongNgheManHinhController::class,'xoa'])->name('cong-nghe-man-hinh.xoa');







//cong sac
Route::get('/cong-sac/danh-sach',[CongSacController::class,'danhSach'])->name('cong-sac.danh-sach');
Route::get('/cong-sac/them-moi',[CongSacController::class,'themMoi'])->name('cong-sac.them-moi');
Route::post('/cong-sac/them-moi',[CongSacController::class,'xuLyThemMoi'])->name('cong-sac.xu-ly-them-moi');
Route::get('/cong-sac/cap-nhat/{id}',[CongSacController::class,'capNhat'])->name('cong-sac.cap-nhat');
Route::post('/cong-sac/cap-nhat/{id}',[CongSacController::class,'xuLyCapNhat'])->name('cong-sac.xu-ly-cap-nhat');
Route::post('/cong-sac/xoa/{id}',[CongSacController::class,'xoa'])->name('cong-sac.xoa');







//do phan giai mang hinh
Route::get('/do-phan-giai-man-hinh/danh-sach',[DoPhanGiaiManHinhController::class,'danhSach'])->name('do-phan-giai-man-hinh.danh-sach');
Route::get('/do-phan-giai-man-hinh/them-moi',[DoPhanGiaiManHinhController::class,'themMoi'])->name('do-phan-giai-man-hinh.them-moi');
Route::post('/do-phan-giai-man-hinh/them-moi',[DoPhanGiaiManHinhController::class,'xuLyThemMoi'])->name('do-phan-giai-man-hinh.xu-ly-them-moi');
Route::get('/do-phan-giai-man-hinh/cap-nhat/{id}',[DoPhanGiaiManHinhController::class,'capNhat'])->name('do-phan-giai-man-hinh.cap-nhat');
Route::post('/do-phan-giai-man-hinh/cap-nhat/{id}',[DoPhanGiaiManHinhController::class,'xuLyCapNhat'])->name('do-phan-giai-man-hinh.xu-ly-cap-nhat');
Route::post('/do-phan-giai-man-hinh/xoa/{id}',[DoPhanGiaiManHinhController::class,'xoa'])->name('do-phan-giai-man-hinh.xoa');








//dung luong ram
Route::get('/dung-luong-ram/danh-sach',[DungLuongRamController::class,'danhSach'])->name('dung-luong-ram.danh-sach');
Route::get('/dung-luong-ram/them-moi',[DungLuongRamController::class,'themMoi'])->name('dung-luong-ram.them-moi');
Route::post('/dung-luong-ram/them-moi',[DungLuongRamController::class,'xuLyThemMoi'])->name('dung-luong-ram.xu-ly-them-moi');
Route::get('/dung-luong-ram/cap-nhat/{id}',[DungLuongRamController::class,'capNhat'])->name('dung-luong-ram.cap-nhat');
Route::post('/dung-luong-ram/cap-nhat/{id}',[DungLuongRamController::class,'xuLyCapNhat'])->name('dung-luong-ram.xu-ly-cap-nhat');
Route::post('/dung-luong-ram/xoa/{id}',[DungLuongRamController::class,'xoa'])->name('dung-luong-ram.xoa');








//he dieu hanh
Route::get('/he-dieu-hanh/danh-sach',[HeDieuHanhController::class,'danhSach'])->name('he-dieu-hanh.danh-sach');
Route::get('/he-dieu-hanh/them-moi',[HeDieuHanhController::class,'themMoi'])->name('he-dieu-hanh.them-moi');
Route::post('/he-dieu-hanh/them-moi',[HeDieuHanhController::class,'xuLyThemMoi'])->name('he-dieu-hanh.xu-ly-them-moi');
Route::get('/he-dieu-hanh/cap-nhat/{id}',[HeDieuHanhController::class,'capNhat'])->name('he-dieu-hanh.cap-nhat');
Route::post('/he-dieu-hanh/cap-nhat/{id}',[HeDieuHanhController::class,'xuLyCapNhat'])->name('he-dieu-hanh.xu-ly-cap-nhat');
Route::post('/he-dieu-hanh/xoa/{id}',[HeDieuHanhController::class,'xoa'])->name('he-dieu-hanh.xoa');








//khang nuoc
Route::get('/khang-nuoc/danh-sach',[KhangNuocController::class,'danhSach'])->name('khang-nuoc.danh-sach');
Route::get('/khang-nuoc/them-moi',[KhangNuocController::class,'themMoi'])->name('khang-nuoc.them-moi');
Route::post('/khang-nuoc/them-moi',[KhangNuocController::class,'xuLyThemMoi'])->name('khang-nuoc.xu-ly-them-moi');
Route::get('/khang-nuoc/cap-nhat/{id}',[KhangNuocController::class,'capNhat'])->name('khang-nuoc.cap-nhat');
Route::post('/khang-nuoc/cap-nhat/{id}',[KhangNuocController::class,'xuLyCapNhat'])->name('khang-nuoc.xu-ly-cap-nhat');
Route::post('/khang-nuoc/xoa/{id}',[KhangNuocController::class,'xoa'])->name('khang-nuoc.xoa');

//kich thuoc man hinh
Route::get('/kich-thuoc-man-hinh/danh-sach',[KichThuocManHinhController::class,'danhSach'])->name('kich-thuoc-man-hinh.danh-sach');
Route::get('/kich-thuoc-man-hinh/them-moi',[KichThuocManHinhController::class,'themMoi'])->name('kich-thuoc-man-hinh.them-moi');
Route::post('/kich-thuoc-man-hinh/them-moi',[KichThuocManHinhController::class,'xuLyThemMoi'])->name('kich-thuoc-man-hinh.xu-ly-them-moi');
Route::get('/kich-thuoc-man-hinh/cap-nhat/{id}',[KichThuocManHinhController::class,'capNhat'])->name('kich-thuoc-man-hinh.cap-nhat');
Route::post('/kich-thuoc-man-hinh/cap-nhat/{id}',[KichThuocManHinhController::class,'xuLyCapNhat'])->name('kich-thuoc-man-hinh.xu-ly-cap-nhat');
Route::get('/kich-thuoc-man-hinh/xoa/{id}',[KichThuocManHinhController::class,'xoa'])->name('kich-thuoc-man-hinh.xoa');

//the sim
Route::get('/the-sim/danh-sach',[TheSimController::class,'danhSach'])->name('the-sim.danh-sach');
Route::get('/the-sim/them-moi',[TheSimController::class,'themMoi'])->name('the-sim.them-moi');
Route::post('/the-sim/them-moi',[TheSimController::class,'xuLyThemMoi'])->name('the-sim.xu-ly-them-moi');
Route::get('/the-sim/cap-nhat/{id}',[TheSimController::class,'capNhat'])->name('the-sim.cap-nhat');
Route::post('/the-sim/cap-nhat/{id}',[TheSimController::class,'xuLyCapNhat'])->name('the-sim.xu-ly-cap-nhat');
Route::get('/the-sim/xoa/{id}',[TheSimController::class,'xoa'])->name('the-sim.xoa');
//pin
Route::get('/pin/danh-sach',[PinController::class,'danhSach'])->name('pin.danh-sach');
Route::get('/pin/them-moi',[PinController::class,'themMoi'])->name('pin.them-moi');
Route::post('/pin/them-moi',[PinController::class,'xuLyThemMoi'])->name('pin.xu-ly-them-moi');
Route::get('/pin/cap-nhat/{id}',[PinController::class,'capNhat'])->name('pin.cap-nhat');
Route::post('/pin/cap-nhat/{id}',[PinController::class,'xuLyCapNhat'])->name('pin.xu-ly-cap-nhat');
Route::get('/pin/xoa/{id}',[PinController::class,'xoa'])->name('pin.xoa');
//tinh nang mang hinh
Route::get('/tinh-nang-man-hinh/danh-sach',[TinhNangManHinhController::class,'danhSach'])->name('tinh-nang-man-hinh.danh-sach');
Route::get('/tinh-nang-man-hinh/them-moi',[TinhNangManHinhController::class,'themMoi'])->name('tinh-nang-man-hinh.them-moi');
Route::post('/tinh-nang-man-hinh/them-moi',[TinhNangManHinhController::class,'xuLyThemMoi'])->name('tinh-nang-man-hinh.xu-ly-them-moi');
Route::get('/tinh-nang-man-hinh/cap-nhat/{id}',[TinhNangManHinhController::class,'capNhat'])->name('tinh-nang-man-hinh.cap-nhat');
Route::post('/tinh-nang-man-hinh/cap-nhat/{id}',[TinhNangManHinhController::class,'xuLyCapNhat'])->name('tinh-nang-man-hinh.xu-ly-cap-nhat');
Route::get('/tinh-nang-man-hinh/xoa/{id}',[TinhNangManHinhController::class,'xoa'])->name('tinh-nang-man-hinh.xoa');
//mau
Route::get('/mau/danh-sach',[MauController::class,'danhSach'])->name('mau.danh-sach');
Route::get('/mau/them-moi',[MauController::class,'themMoi'])->name('mau.them-moi');
Route::post('/mau/them-moi',[MauController::class,'xuLyThemMoi'])->name('mau.xu-ly-them-moi');
Route::get('/mau/cap-nhat/{id}',[MauController::class,'capNhat'])->name('mau.cap-nhat');
Route::post('/mau/cap-nhat/{id}',[MauController::class,'xuLyCapNhat'])->name('mau.xu-ly-cap-nhat');
Route::get('/mau/xoa/{id}',[MauController::class,'xoa'])->name('mau.xoa');