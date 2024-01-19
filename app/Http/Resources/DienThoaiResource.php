<?php

namespace App\Http\Resources;

use App\Models\ThongSo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DienThoaiResource extends JsonResource
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
            'ten' => $this->ten,
            'nha_san_xuat' => $this->nha_san_xuat,
            'mo_ta' => $this->mo_ta,
            'chi_tiet_dien_thoai' => ChiTietDienThoaiResource::collection($this->chiTietDienThoai),
            'hinh_anh'=>$this->hinhAnh,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
