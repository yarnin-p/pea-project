<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserPermissionRequest extends FormRequest
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
            'permission_id' => [
                'required',
                Rule::exists('permissions', 'id')->whereNull('deleted_at')
            ],
            'user_id' => [
                'required',
//                Rule::exists('users', 'id')->whereNull('deleted_at')
                Rule::exists('users', 'id')
            ]
        ];
    }

    public function messages()
    {
        return [
            'permission_id.required' => 'กรุณาเลือก permission',
            'permission_id.exists' => 'ไอดี permission ไม่มีอยู่ในระบบ',
            'user_id.required' => 'กรุณาเลือกผู้ใช้',
            'user_id.exists' => 'ไอดีผู้ใช้ไม่มีอยู่ในระบบ'
        ];
    }
}
