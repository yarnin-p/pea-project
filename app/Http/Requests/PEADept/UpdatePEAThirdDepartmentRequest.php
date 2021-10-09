<?php

namespace App\Http\Requests\PEADept;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePEAThirdDepartmentRequest extends FormRequest
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
                Rule::unique('pea_third_departments', 'name')
                    ->whereNot('id', $this->route('PEAThirdDept')->id)
                    ->whereNull('deleted_at'),
            ],
            'pea_dept_id' => [
                'required',
                Rule::exists('pea_second_departments', 'dept_code')->whereNull('deleted_at')
            ],
            'dept_code' => [
                'required',
                Rule::unique('pea_third_departments', 'dept_code')
                    ->whereNot('id', $this->route('PEAThirdDept')->id)
                    ->whereNull('deleted_at')
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณาใส่ชื่อสำนักงาน',
            'name.unique' => 'ชื่อสำนักงานมีอยู่ในระบบแล้ว',
            'pea_dept_id.required' => 'กรุณาระบุรหัสสำนักงานระดับสอง',
            'pea_dept_id.exists' => 'รหัสสำนักงานระดับสองไม่มีอยู่ในระบบ',
            'dept_code.required' => 'กรุณาใส่รหัสสำนักงาน',
            'dept_code.unique' => 'รหัสสำนักงานมีอยู่ในระบบแล้ว'
        ];
    }
}
