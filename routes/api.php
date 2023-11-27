<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIDienThoaiController;
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
