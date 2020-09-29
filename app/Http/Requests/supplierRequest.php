<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class supplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required|numeric|min:8|unique:suppliers',
            'address' => 'required',

        ];
    }



    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'الاسم اجبارى',
            'phone.required' => 'رقم الهاتف اجبارى',
            'address.required' => 'العنوان اجبارى',
            'phone.integer' => 'رقم الهاتف لايقبل حروف',
            'phone.unique' => 'رقم الهاتف موجود مسبقا',
            'phone.size' => 'يجب ان يكون طول رقم الهاتف على الاقل ثمانيه ارقام',
        ];
    }
}
