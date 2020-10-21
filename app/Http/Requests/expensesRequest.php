<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class expensesRequest extends FormRequest
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
            'expense_category_id' => 'required',
            'stock_id' => 'required',
            'account_id' => 'required',
            'amount' => 'required|nullable',
            'note'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'expense_category_id.required' => 'الرجاء اختيار قسم المنصرفات',
            'stock_id.required' => 'الرجاء اختيار المخزن',
            'account_id.required'=> 'الرجاء اختيار الحساب',
            'amount.required' => 'الرجاء كتابة المبلغ',
            'note.required' => 'الرجاء كتابة ملاحظة المنصرف',

        ];
    }
}
