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
            'category_id' => 'required',
            'sale_price' => 'required|numeric',
            'purchase_price' => 'nullable|numeric',
            'qyt' => 'nullable|integer',
            'unit_id'=>'required',
            'ratio'=>'numeric',
            'barcode' => 'required|nullable'
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
            'category_id.required' => 'التصنيف اجبارى',
            'sale_price.required' => 'سعر الببيع اجبارى',
            'unit_id.required'=>'الوحده اجبارية',
            'barcode.nullable'=>'يجب ان يكون الباركود على شكل ارقام',
            'ratio.numeric' =>'النسبه على صيغة رقم فقط',
            'barcode.required'=>'ادخال الباركود اجباري'


        ];
    }
}
