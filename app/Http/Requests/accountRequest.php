<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class accountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  Auth::check();
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
            'type' => 'required',
            'initial_balance'=>'numeric',
            'account_no'=>'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الاسم اجبارى',
            'initial_balance.numeric'=>'مسموح ادخال ارقام فقط',
            'account_no.required'=>'يجب ادخال رقم حساب',
            'account_no.numeric'=>'مسموح ادخال ارقام فقط'
        ];
    }
}
