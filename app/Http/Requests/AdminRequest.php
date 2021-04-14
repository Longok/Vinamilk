<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'admin_name'=> 'required|',
            'admin_email'=>'required|unique:admin,admin_email',
            'admin_password'=>'required',
            'admin_roles'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'admin_name.required' => ('Bạn chưa nhập tên'),
            'admin_email.required' => ('Bạn chưa nhập email'),
            'admin_password.required' => ('Bạn chưa nhập password'),
            'admin_roles.required' => ('Bạn chưa thêm quyền hạn "0" hoặc "1" ')
        ];
    }
}
