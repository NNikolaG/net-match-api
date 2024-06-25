<?php

namespace App\Http\Resources\Settings;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'last_name' => $this->last_name,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'skill_level' => $this->skill_level,
            'availability' => $this->availability,
            'city' => $this->city,
            'bio' => $this->bio,
            'profile_picture' => $this->profile_picture,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'club_id' => $this->club_id,
            'club' => $this->club->name,
            'created_at' => Carbon::parse($this->created_at)->format('d.m.Y H:i'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d.m.Y H:i'),
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
        ];
    }
}
