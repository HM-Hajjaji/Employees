<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'full_name' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'registration_number' => 'required|integer|max:999999999',
            'department' => 'required',
            'address' => 'required',
            'phone' => 'required|size:10'
        ];
    }
}
