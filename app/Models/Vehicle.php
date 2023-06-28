<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'kms',
        'year',
        'price',
        'discount_price',
        'avilable',
        'status',
        'branch_id',
        'brand_id',
        'color_id',
        'vehicle_type_id',
        'doors',
        'rim_size',
        'rim_material',
        'tire_size',
        'tire_lifetime',
        'trunk_opening' => '',
        'air_conditioning',
        'seating_materials',
        'seat_air_conditioning',
        'seating_color',
        'brakes_type',
        'fuel_type',
        'gas_consumption',
        'traction',
        'transmission',
    ];

    protected $casts = [ 
        'gallery' => 'json',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    
    public function brand()
    {
        return $this->belongsTo(VehicleBrand::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function vehicle_type()
    {
        return $this->belongsTo(VehicleType::class);
    }
}
