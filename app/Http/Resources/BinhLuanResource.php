<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BinhLuanResource extends JsonResource
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
            'binh_luan_cap_hai' => $this->binh_luan_cap_hai->map(function ($item) {
                return [
                    'khach_hang' => $item->khach_hang, 
                    'id' => $item->id,
                    'noi_dung' => $item->noi_dung,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                    // Các thông tin khác nếu cần
                ];
            }),
            // 'binh_luan_cap_hai_id' => $this->binh_luan_cap_hai,
            'khach_hang_id' => $this->khach_hang,
            'dien_thoai_id' => $this->dien_thoai_id,
            'noi_dung' => $this->noi_dung,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
