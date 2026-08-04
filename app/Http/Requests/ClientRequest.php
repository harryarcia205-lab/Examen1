<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|required|min:3|max:50',
            'email' => 'string|required|email|max:100',
            'telephone' => 'string|nullable|min:8|max:20',
            'balance' => 'numeric|required|min:0',
            'credit_limit' => 'numeric|required|min:0',
            'discount' => 'numeric|nullable|min:0|max:100',
            'registration_date' => 'date|nullable',
            'client_status' => 'string|nullable|min:3|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'El nombre solo permite caracteres',
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El minimo de caracteres es 3',
            'name.max' => 'El maximo de caracteres es 50',

            'email.string' => 'El correo electronico solo permite caracteres',
            'email.required' => 'El correo electronico es requerido',
            'email.email' => 'Debe ingresar un correo valido',
            'email.max' => 'El maximo de caracteres es 100',

            'telephone.string' => 'El numero de telefono solo permite caracteres',
            'telephone.required' => 'El numero de telefono es requerido',
            'telephone.min' => 'El minimo de caracteres es 8',
            'telephone.max' => 'El maximo de caracteres es 20',

            'balance.numeric' => 'El balance debe ser un numero',
            'balance.required' => 'El balance es requerido',
            'balance.min' => 'El minimo de caracteres es 0',

            'credit_limit.numeric' => 'El limite de credito debe ser un numero',
            'credit_limit.required' => 'El limite de credito es requerido',
            'credit_limit.min' => 'El minimo de caracteres es 0',

            'discount.numeric' => 'El descuento debe ser un numero',
            'discount.min' => 'El minimo de caracteres es 0',
            'discount.max' => 'El maximo de caracteres es 100',

            'registration_date.date' => 'debe ingresar una fecha valida',
            'registration_date.required' => 'La fecha de registro es requerida',

            'client_status.string' => 'El estado del cliente solo permite caracteres',
            'client_status.required' => 'El estado del cliente es requerido',
            'client_status.min' => 'El minimo de caracteres es 3',
            'client_status.max' => 'El maximo de caracteres es 20',
        ];
}

}