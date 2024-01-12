<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DanhGiaResource extends JsonResource
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
            'khach_hang_id' => $this->khach_hang,
            'dien_thoai_id' => $this->dien_thoai_id,
            'mo_ta' => $this->mo_ta,
            'so_sao' => $this->so_sao,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
