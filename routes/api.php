<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIDienThoaiController;
use App\Http\Controllers\APIKhachHangController;
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


Route::post('/khach-hang/dang-ky', [APIKhachHangController::class, 'dangKy'])->name('khach-hang.dang-ky');

Route::middleware(['api'])->group(function () {
    Route::prefix('khach-hang')->group(function () {
        Route::post('/dang-nhap',[APIKhachHangController::class,'login']);
        Route::post('/dang-xuat', [APIKhachHangController::class,'logout']);
    });
});