<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập vào email',
            'email.unique' => 'Email đã được đăng ký',
            'phone.required' => 'Vui lòng nhập vào số điện thoại',
            'phone.unique' => 'Số điện thoại đã được đăng ký',
            'password.required' => 'Vui lòng nhập vào password',
        ];
    }
}
