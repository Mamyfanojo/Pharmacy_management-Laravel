<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class MedicamentRequest extends FormRequest
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
        return [
            'nom' => 'required',
            'code'=> 'required',
            'description'=> 'required',
            'prix_unit'=> 'required',
            'stock'=> 'required|numeric',
            'forme'=> 'nullable',
            'avertissement'=> 'nullable',
            'effet'=> 'nullable',
            'date_exp'=> 'required',
            'image'=> ['image', 'max:2000'],
            'category_id' => ['required', 'exists:categories,id'],
            'supplier_id' => ['required', 'exists:suppliers,id']
        ];
    }
}
