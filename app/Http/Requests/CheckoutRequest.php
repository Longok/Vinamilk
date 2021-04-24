<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'shipping_name'=> 'required',
            'shipping_phone'=>'required',
            'shipping_adress'=>'required',
            'shipping_email'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'shipping_name.required' => ('Bạn chưa nhập tên'),
            'shipping_phone.required' => ('Bạn chưa nhập số điện thoại'),
            'shipping_adress.required' => ('Bạn chưa thêm địa chỉ'),
            'shipping_email.required' => ('Bạn chưa nhập email')
        ];
    }
}
