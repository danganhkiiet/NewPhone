<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NhaSanXuatResource extends JsonResource
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
            'ten' => $this->ten,
            'dia_chi' => $this->dia_chi,
            'email' => $this->email,
            'so_dien_thoai' => $this->so_dien_thoai,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'dienThoai' => DienThoaiResource::collection($this->dienThoai) // Sử dụng resource của DienThoai
        ];
    }
}
