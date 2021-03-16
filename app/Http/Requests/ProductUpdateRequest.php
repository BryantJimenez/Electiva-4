<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'cod' => 'required|string|min:5|max:191',
            'stock' => 'required|string|min:1|max:15',
            'sale_price' => 'required|string|min:1|max:15',
            'purchase_price' => 'required|string|min:1|max:15'
        ];
    }
}
