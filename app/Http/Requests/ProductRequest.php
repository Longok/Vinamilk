<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=> 'required|:products,name',
            'quantity'=>'required',
            'price'=>'required',
            'image'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ('Bạn chưa nhập tên sản phẩm'),
            'quantity.required' => ('Bạn chưa nhập số lượng'),
            'price.required' => ('Bạn chưa nhập giá cả'),
            'image.required' => ('Bạn chưa thêm hình ảnh')
        ];
    }
}
