<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:191',
            'category_id' => 'required',
            'provider_id' => 'required',
            'cod' => 'required|string|min:5|max:191|unique:products',
            'stock' => 'required|string|min:1|max:15',
            'sale_price' => 'required|string|min:1|max:15',
            'purchase_price' => 'required|string|min:1|max:15'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'La categoria es obligatoria.',
            'provider_id.required' => 'El Proveedor es obligatorio',
            'sale_price.required' => 'El precio de venta es obligatorio',
            'purchase_price.required' => 'El precio de compra es obligatorio.',
            'cod.required' => 'El campo codigo es obligatorio.',
            'cod.min' => 'El campo codigo debe contener al menos 5 caracteres.',
        ];
    }


}
