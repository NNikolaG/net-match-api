<?php

namespace App\Http\Resources\Settings;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourtResource extends JsonResource
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
            'surface' => $this->surface,
            'indoor' => $this->indoor,
            'lightning' => $this->lightning,
            'length' => $this->length,
            'width' => $this->width,
            'balls_provided' => $this->balls_provided,
            'location' => $this->location,
            'club_id' => $this->club->id,
            'club' => $this->club->name,
            'capacity' => $this->capacity,
            'created_at' => Carbon::parse($this->created_at)->format('d.m.Y H:i'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d.m.Y H:i'),
        ];
    }
}
