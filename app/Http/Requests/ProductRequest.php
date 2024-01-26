<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends BaseRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return match($this->method()){
            'POST' => [
                'name' => 'required|string|min:4',
                'price' => 'required|integer',
                'quantity' => 'required|integer',
            ],
            'PUT' => [
                'id' => 'required|int|exists:products,id',
                'name' => 'nullable|string|min:4',
                'price' => 'nullable|string',
                'quantity' => 'nullable|integer',
            ]
        };
    }

    public function attributes():array
    {
        return [
            'name' => 'nombre',
            'price' => 'precio',
            'quantity'=> 'cantidad',
        ];
    }

    public function messages():array
    {
        return [
            'required' => 'The field :attribute is required',
            'string' => 'The field :attribute must contain only letters',
            'intenger' => 'The field :attribute must contain only number',
            'min' => 'The field :attribute must have at least 4 characters'
        ];
    }
}
