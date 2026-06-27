<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FactoryArticleRequest extends FormRequest
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
            'factory_id' => 'integer|required|exists:factories,id',
            'article_id' => 'integer|required|exists:articles,id',
            'current_stock' => 'integer|required|min:0',
            'supplier_negotiated_cost' => 'numeric|required|min:0',
            'estimated_delivery' => 'date|required',
        ];
    }

    public function messages(): array
    {
        return [
            'factory_id.integer' => 'La fabrica debe ser un numero',
            'factory_id.required' => 'La fabrica es requerida',
            'factory_id.exists' => 'El articulo seleccionado no existe',

            'article_id.integer' => 'El articulo debe ser un numero',
            'article_id.required' => 'El articulo es requerido',
            'article_id.exists' => 'El articulo seleccionado no existe',

            'current_stock.integer' => 'El stock debe ser un numero entero',
            'current_stock.required' => 'El stock es requerido',
            'current_stock.min' => 'El minimo de caracteres es 0',

            'supplier_negotiated_cost.numeric' => 'El costo debe ser un numero',
            'supplier_negotiated_cost.required' => 'El costo es requerido',
            'supplier_negotiated_cost.min' => 'El minimo de caracteres es 0',

            'estimated_delivery.date' => 'Debe ingresar una fecha valida',
            'estimated_delivery.required' => 'La fecha estimada de entrega es requerida',
        ];
    }
}
