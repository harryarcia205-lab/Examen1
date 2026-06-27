<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'internal_code' => 'string|required|min:3|max:20|unique:articles,internal_code',
            'detailed_description' => 'string|required|min:5|max:255',
            'current_selling_price' => 'numeric|required|min:0',
            'average_status' => 'numeric|required|min:0',
            'availability_status' => 'string|required|min:3|max:20',
            'entry_date' => 'date|required',
        ];

    }
    public function messages(): array
    {
        return [
            'internal_code.string' => 'El codigo interno solo permite caracteres',
            'internal_code.required' => 'El codigo interno es requerido',
            'internal_code.min' => 'El minimo de caracteres es 3',
            'internal_code.max' => 'El maximo de caracteres es 20',
            'internal_code.unique' => 'El codigo interno ya esta registrado',

            'detailed_description.string' => 'La descripcion detallada solo permite caracteres',
            'detailed_description.required' => 'La descripcion detallada es requerida',
            'detailed_description.min' => 'El minimo de caracteres es 5',
            'detailed_description.max' => 'El maximo de caracteres es 255',

            'current_selling_price.numeric' => 'El precio de venta debe ser un numero',
            'current_selling_price.required' => 'El precio de venta es requerido',
            'current_selling_price.min' => 'El minimo de caracteres es 0',

            'average_status.numeric' => 'El estado promedio debe ser un numero',
            'average_status.required' => 'El estado promedio es requerido',
            'average_status.min' => 'El minimo de caracteres es 0',

            'availability_status.string' => 'El estado de disponibilidad solo permite caracteres',
            'availability_status.required' => 'El estado de disponibilidad es requerido',
            'availability_status.min' => 'El minimo de caracteres es 3',
            'availability_status.max' => 'El maximo de caracteres es 20',

            'entry_date.date' => 'Debe ingresar una fecha valida',
            'entry_date.required' => 'La fecha de ingreso es requerida',
        ];

            
}
}