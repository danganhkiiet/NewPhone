<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChiTietDienThoaiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'dien_thoai_id' => $this->dienThoai,
            // 'dien_thoai_id'=>$this->dienThoai->nha_san_xuat,
            'mau_sac_id' => $this->mauSac,
            'dung_luong_id' => $this->dungLuong,
            'so_luong'=>$this->so_luong,
            'gia_ban'=>$this->gia_ban,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
