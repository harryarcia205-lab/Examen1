<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FactoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): bool
    {
        return [
            'name' => 'required|string|min:3|max:150',
            'identificacion' => 'string|required|min:3|max:50',
            'phone' => 'string|required|min:7|max:20',
            'email' => 'string|required|email|max:25',
            'address' => 'string|required|min:3|max:25',
            'supplier_status' => 'string|required|min:3|max:20',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            'name.string' => 'El nombre solo permite caracteres',
            'name. required' => 'El nombre es requerido',
            'name.min' => 'El minimo de caracteres es 3',
            'name.max' => 'El maximo de caracteres es 150',

            'identificacion.string' => 'El numero de identificacion solo permite caracteres',
            'identificacion.required' => 'El numero de identificacion es requerido',
            'identificacion.min' => 'El minimo de caracteres es 3',
            'identificacion.max' => 'El maximo de caracteres es 50',

            'phone.string' => 'El telefono solo permite caracteres',
            'phone.required' => 'El telefono es requerido',
            'phone.min' => 'El minimo de caracteres es 7',
            'phone.max' => 'El maximo de caracteres es 20',

            'email.string' => 'El correo electronico solo permite caracteres',
            'email.required' => 'El correo electronico es requerido',
            'email.max' => 'El maximo de caracteres es 25',

            'address.string' => 'La direccion solo permite caracteres',
            'address.required' => 'La direccion es requerida',
            'address.min' => 'El minimo de caracteres es 3',
            'address.max' => 'El maximo de caracteres es 25',

            'shipping.string' => 'El envio solo permite caracteres',
            'shipping.required' => 'El envio es requerido',
            'shipping.min' => 'El minimo de caracteres es 3',
            'shipping.max' => 'El maximo de caracteres es 20',
        ];
    }
}
