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
}
