<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddressShippingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id' => 'required|integer|exists:clients,id',
            'number'   => 'required|string|min:1|max:10',
            'street'  => 'required|string|min:3|max:100',
            'neighborhood' => 'required|string|min:3|max:100',
            'city'  => 'required|string|min:2|max:50',
            'reference_location' => 'nullable|string|max:150',
            'states_address'=> 'required|string|min:3|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'client_id.integer'  => 'El cliente debe ser un número',
            'client_id.required' => 'El cliente es requerido',
            'client_id.exists'   => 'El cliente seleccionado no existe',

            'number.string'      => 'El número solo permite caracteres',
            'number.required'    => 'El número es requerido',
            'number.min'         => 'El mínimo de caracteres es 1',
            'number.max'         => 'El máximo de caracteres es 10',

            'street.string'      => 'La calle solo permite caracteres',
            'street.required'    => 'La calle es requerida',
            'street.min'         => 'El mínimo de caracteres es 3',
            'street.max'         => 'El máximo de caracteres es 100',

            'neighborhood.string'   => 'El barrio solo permite caracteres',
            'neighborhood.required' => 'El barrio es requerido',
            'neighborhood.min'      => 'El mínimo de caracteres es 3',
            'neighborhood.max'      => 'El máximo de caracteres es 100',

            'city.string'        => 'La ciudad solo permite caracteres',
            'city.required'      => 'La ciudad es requerida',
            'city.min'           => 'El mínimo de caracteres es 2',
            'city.max'           => 'El máximo de caracteres es 50',

            'reference_location.string' => 'La referencia solo permite caracteres',
            'reference_location.max'    => 'El máximo de caracteres es 150',

            'states_address.string'   => 'El estado solo permite caracteres',
            'states_address.required' => 'El estado es requerido',
            'states_address.min'      => 'El mínimo de caracteres es 3',
            'states_address.max'      => 'El máximo de caracteres es 50',
        ];
    }
}