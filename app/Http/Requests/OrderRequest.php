<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'address_id' => 'integer|required|exists:address,id',
            'date_time_creation' => 'date|required',
            'subtotal' => 'numeric|required|min:0',
            'tax_amount' => 'numeric|required|min:0',
            'grand_total' => 'numeric|required|min:0',
            'additional_notes' => 'string|nullable|max:250',
            'order_status' => 'string|required|min:3|max:20'
        ];
    }

    public function messages(): array
    {
        return [
            'client_id.integer' => 'El cliente debe ser un numero',
            'client_id.required' => 'El cliente debe ser requerido',
            'client_id.exists' => 'El cliente seleccionado no existe',

            'address_id.integer' => 'La direccion debe ser un numero',
            'address_id.required' => 'La direccion debe ser requerida',
            'address_id.exists' => 'La direccion seleccionada no existe',

            'date_time_creation.required' => 'La fecha de creacion es requerida',
            'date_time_creation.date' => 'Debe ingresar una fecha valida',
    
            'subtotal.numeric' => 'El subtotal debe ser un numero',
            'subtotal.required' => 'El subtotal debe ser requerido',
            'subtotal.min' => 'El minimo de caracteres es 0',

            'tax_amount.numeric' => 'El impuesto debe ser un numero',
            'tax_amount.required' => 'El impuesto debe ser requerido',
            'tax_amount.min' => 'El minimo de caracteres es 0',

            'grand_total.numeric' => 'El total deber ser un numero',
            'grand_total.required' => 'El total es requerido',
            'grand_total.min' => 'El minimo de caracteres es 0',

            'additional_notes.string' => 'Las notas solo permite caracteres',
            'additional_notes.max' => 'El maximo de caracteres es 250',

            'order_status.string' => 'El estado de la orden solo permite caracteres',
            'order_status.required'=> 'El estado de la orden es requerido',
            'order_status.min' => 'El minimo de caracteres es 3',
            'order_status.max' => ' El maximo de caracteres es 20',

        ];


            
    }
}