<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'photo' => 'nullable',
            'name' => 'required|string|min:2|max:191',
            'dni' => 'nullable|string|min:5|max:15',
            'address' => 'required|string|min:5|max:191',
            'phone' => 'nullable|string|min:5|max:15',
            'type' => 'required',
            'user' => 'required|string|min:5|max:191'
        ];
    }
}
