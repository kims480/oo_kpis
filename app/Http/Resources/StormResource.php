<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Storm */
class StormResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Name' => $this->Name,
            'phone_number' => $this->phone_number,
            'active' => $this->active,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
