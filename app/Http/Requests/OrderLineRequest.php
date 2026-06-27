<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderLineRequest extends FormRequest
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
            'article_id' => 'integer|required|exists:articles,id',
            'requested_quantity' => 'integer|required|min:1',
            'unit_price' => 'numeric|required|min:0',
            'line_subtotal' => 'numeric|required|min:0',

        ];
    }

    public function messages(): array 
    {
        return [
            'article_id.integer' => 'La cantidad debe ser un numero entero',
            'article_id.required' => 'La cantidad es requerida',
            'article_id.exists' => 'El articulo seleccionado no existe',

            'requested_quantity.integer' => 'La cantidad debe ser un numero entero',
            'request_quantity.required' => 'La cantidad solicitada es requerida',
            'request_quantity.min' => 'El minimo de caracteres es 1',

            'unit_price.numeric' => 'El precio unitario debe ser un numero',
            'unit_price.required' => 'El precio unitario es requerida',
            'unit_price.min' => 'El minimo de caracteres es 0',

            'line_subtotal.numeric' => 'El subtotal debe ser un numero',
            'line_subtotal.required' => 'El subtotal debe ser requerido',
            'line_subtotal.min' => 'El minimo de caracteretes es 0',
        ];
}
}