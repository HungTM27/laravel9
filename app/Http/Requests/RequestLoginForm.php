<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLoginForm extends FormRequest
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
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|digits:8'
        ];
    }
    public function messages(){
        return [
            'username.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Tài khoản Email đã được đăng ký',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.digits' => 'Mật khẩu phải trên 8 kí tự'
        ];

    }
}
