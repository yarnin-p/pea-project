<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|confirmed|min:8|max:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณากรอกชื่อ',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.unique' => 'อีเมลนี้มีอยู่ในระบบแล้ว',
            'password.min' => 'รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัว',
            'password.max' => 'รหัสผ่านต้องมีความยาวไม่เกิน 8 ตัว',
            'password.confirmed' => 'ยืนยันรหัสผ่านไม่ถูกต้อง',
            'password.required' => 'กรุณากรอกรหัสผ่าน'
        ];
    }
}
