<?php

namespace App\Http\Resources\user;

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
        $backendUrl = config('app.url');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'profile_photo_url' => isset($this->profile_photo_path) ? $backendUrl.$this->profile_photo_path : $this->profile_photo_url,
            'phone' => $this->phone,
            'status' => $this->status,
            'entry_date' => $this->entry_date,
            'role' => $this->role
        ];
    }
}
