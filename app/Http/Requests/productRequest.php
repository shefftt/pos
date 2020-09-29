<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class productRequest extends FormRequest
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
            'category_id' => 'required',
            'sale_price' => 'required|integer',
            'purchase_price' => 'nullable|integer',
            'stock_id' => 'required',
            'qyt' => 'nullable|integer'
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
            'name.required' => 'اسم المنتج اجبارى',
            'qyt.integer' => 'عفوا يجب ان تكون الكميه فى شكل ارقام',
            'purchase_price.integer' => 'عفوا يجب ان يكون سعر الشراء فى شكل ارقام',
            'sale_price.integer' => 'عفوا يجب ان يكون سعر البيع فى شكل ارقام',
            'category_id.required' => 'التصنيف اجبار    ى',
            'sale_price.required' => 'سعر الببيع اجبارى',
            'stock_id.required' => 'المخزن الافتراضى اجبارى'
        ];
    }
}
