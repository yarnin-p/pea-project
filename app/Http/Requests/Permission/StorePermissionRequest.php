<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePermissionRequest extends FormRequest
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
            'method' => 'required',
            'endpoint' => [
                'required',
                Rule::unique('permissions', 'endpoint')
                    ->whereNull('deleted_at')
                    ->where('method', $this->input('method'))
            ]
        ];
    }

    public function messages()
    {
        return [
            'method.required' => 'กรุณากรอก HTTP method',
            'endpoint.required' => 'กรุณากรอก endpoint',
            'endpoint.unique' => 'endpoint และ HTTP method นี้มีอยู่ในระบบแล้ว'
        ];
    }
}
