<?php

namespace App\Http\Requests\API\v1;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'middle_name' => [],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,id'],
            // @TODO
            // @FRONTEND
            // Format: (+00)-000-000-0000 / 000-0000
            'phone' => ['required', 'unique:users,id'],
            // @TODO
            // @FRONTEND
            // country, region, state/province, city/municipality, Str. Name, House No./ Building No.
            'address' => ['required'],
            'password' => ['required', 'confirmed']
        ];
    }
}
