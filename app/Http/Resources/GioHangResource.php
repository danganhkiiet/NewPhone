<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GioHangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'khach_hang_id'=>$this->khach_hang,
            'chi_tiet_dien_thoai_id'=>$this->chi_tiet_dien_thoai,
            'dien_thoai_id'=>$this->chi_tiet_dien_thoai->dienThoai,
            'hinh_anh_id'=>$this->chi_tiet_dien_thoai->dienThoai->hinhAnh,
            'mau_sac_id'=>$this->chi_tiet_dien_thoai->mauSac,
            'dung_luong_id'=>$this->chi_tiet_dien_thoai->dungLuong,
            'so_luong'=>$this->so_luong,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
