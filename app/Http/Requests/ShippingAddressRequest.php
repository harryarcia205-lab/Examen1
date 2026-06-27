<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ShippingAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'client_id' => 'integer|required|exists:clients,id',
            'number' => 'string|required|min:1|max:10',
            'street' => 'string|required|min:3|max:100',
            'neighborhood' => 'string|required|min:3|max:100',
            'city' => 'string|required|min:2|max:50',
            'reference_location' => 'string|nullable|max:150',
            'states_address' => 'string|required|min:3|max:50',
        ];
    }

    public function messages(): array 
    {
        return [
            'client_id.integer' => 'El cliente debe ser un numero',
            'client_id.required' => 'El cliente es requerido',
            'client_id.exists' => 'El cliente seleccionado no existe',

            'number.string' => 'El numero solo permite caracteres',
            'number.required' => 'El numero es requerido',
            'number.min' => 'El minimo de caracteres es 1',
            'number.max' => 'El maximo de caracteres es 10',

            'street.string' => 'La calle solo permite caracteres',
            'street.required' => 'La calle es requerida',
            'street.min' => 'El minimo de caracteres es 3',
            'street.max' => 'El maximo de caracteres es 100',

            'neighborhood.string' => 'El barrio solo permite caracteres',
            'neighborhood.required' => 'El barrio es requerido',
            'neighborhood.min' => 'El minimo de caracteres es 3',
            'neighborhood.max' => 'El maximo de caracteres es 100',

            'city.string' => 'La ciudad solo permite caracteres',
            'city.required' => 'La ciudad es requerida',
            'city.min' => 'El minimo de caracteres es 2',
            'city.max' => 'El maximo de caracteres es 50',

            'reference_location.string' => 'La referencia solo permite caracteres',
            'reference_location.max' => 'El maximo de caracteres es 150',
            

            'states_address.string' => 'El estado solo permite caracteres',
            'states_address.required' => 'El estado es requerido',
            'states_address.min' => 'El minimo de caracteres es 3',
            'states_address.max' => 'El maximo de caracteres es 50',
        ];

}

}
