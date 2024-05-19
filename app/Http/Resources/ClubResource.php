<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClubResource extends JsonResource
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
            'name' => $this->name,
            'city' => $this->city,
            'description' => $this->description,
            'address' => $this->address,
            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,
            'contact_email' => $this->contact_email,
            'created_at' => Carbon::parse($this->created_at)->format('d.m.Y H:i'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d.m.Y H:i'),
        ];
    }
}
