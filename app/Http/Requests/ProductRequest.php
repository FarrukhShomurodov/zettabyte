<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'parent_category_id' => 'required|int|exists:parent_categories,id',
            'title' => 'required|string|max:100',
            'quantity'=> 'required|int',
            'images' => 'required|string',
            'price' => 'required|int',
            'description' => 'required|string',
            'sold_quantity' => 'required|int',
            'youtube_link' => 'nullable|string',
            'video' => 'nullable|string'
        ];
    }
}
