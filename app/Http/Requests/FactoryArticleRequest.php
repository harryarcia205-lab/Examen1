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
}
