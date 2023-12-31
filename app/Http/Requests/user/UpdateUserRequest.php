<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'name' => '',
            'email' => '',
            'password' => '',
            'profile_photo_path' => '',
            'last_name' => '',
            'phone' => '',
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
            'email.unique' => 'Ya existe un usuario con este email. Por favor intenta con uno diferente',
        ];
    }
}
