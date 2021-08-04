<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'name'=> 'required|',
            'email'=>'required|unique:customer,email',
            'password'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ('Bạn chưa nhập tên'),
            'email.required' => ('Bạn chưa nhập Email'),
            'email.unique' => ('Email đã tồn tại'),
            'password.required' => ('Bạn chưa nhập Password'),
        ];
    }
}
