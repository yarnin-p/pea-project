<?php

namespace App\Http\Requests\PEADept;

use App\Models\PEADept;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePEADepartmentRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('pea_departments', 'name')->whereNull('deleted_at')
            ],
            'dept_code' => [
                'required',
                Rule::unique('pea_departments', 'dept_code')->whereNull('deleted_at')
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณาใส่ชื่อสำนักงาน',
            'name.unique' => 'ชื่อสำนักงานมีอยู่ในระบบแล้ว',
            'dept_code.required' => 'กรุณาใส่รหัสสำนักงาน',
            'dept_code.unique' => 'รหัสสำนักงานมีอยู่ในระบบแล้ว'
        ];
    }
}
