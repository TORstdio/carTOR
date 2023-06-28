<?php

namespace App\Http\Requests\vehicle;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreVehicleRequest extends FormRequest
{
    /**
     * Determine if the vehicle is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'model' => 'required',
            'kms' => '',
            'year' => '',
            'price' => 'required',
            'discount_price' => '',
            'avilable' => '',
            'status' => '',
            'branch_id' => '',
            'brand_id' => '',
            'color_id' => '',
            'vehicle_type_id' => '',
            'doors' => '',
            'rim_size' => '',
            'rim_material' => '',
            'tire_size' => '',
            'tire_lifetime' => '',
            'trunk_opening' => '',
            'air_conditioning' => '',
            'seating_materials' => '',
            'seat_air_conditioning' => '',
            'seating_color' => '',
            'brakes_type' => '',
            'fuel_type' => '',
            'gas_consumption' => '',
            'traction' => '',
            'transmission' => '',
            'gallery' => ''
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => $validator->messages(),
        ], 422));
    }
    public function messages()
    {
        return [
            'model.required' => 'El campo MODELO es requerido',
            'price.required' => 'El campo PRECIO es requerido',
        ];
    }
}
