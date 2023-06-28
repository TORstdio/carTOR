<?php

namespace App\Http\Resources\vehicle;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'model' => $this->model,
            'kms' => $this->kms,
            'year' => $this->year,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'avilable' => $this->avilable,
            'status' => $this->status,
            'branch' => $this->branch,
            'brand' => $this->brand,
            'color' => $this->color,
            'vehicle_type' => $this->vehicle_type,
            'doors' => $this->doors,
            'rim_size' => $this->rim_size,
            'rim_material' => $this->rim_material,
            'tire_size' => $this->tire_size,
            'tire_lifetime' => $this->tire_lifetime,
            'trunk_opening' => $this->trunk_opening,
            'air_conditioning' => $this->air_conditioning,
            'seating_materials' => $this->seating_materials,
            'seat_air_conditioning' => $this->seat_air_conditioning,
            'seating_color' => $this->seating_color,
            'brakes_type' => $this->brakes_type,
            'fuel_type' => $this->fuel_type,
            'gas_consumption' => $this->gas_consumption,
            'traction' => $this->traction,
            'transmission' => $this->transmission,
            'gallery' => $this->gallery,
        ];
    }
}
