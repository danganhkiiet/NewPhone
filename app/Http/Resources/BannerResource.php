<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
            'ten'=>$this->ten,
            'duong_dan'=>$this->duong_dan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
