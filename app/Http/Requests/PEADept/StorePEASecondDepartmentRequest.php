<?php

namespace App\Http\Requests\PEADept;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePEASecondDepartmentRequest extends FormRequest
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
            'pea_dept_id' => [
                'required',
                'numeric',
                Rule::exists('pea_departments', 'id')->whereNull('deleted_at')
            ],
            'name' => [
                'required',
                Rule::unique('pea_second_departments', 'name')->whereNull('deleted_at')
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณาใส่ชื่อสำนักงาน',
            'name.unique' => 'ชื่อสำนักงานมีอยู่ในระบบแล้ว',
            'pea_dept_id.required' => 'กรุณาระบุไอดีสำนักงานระดับแรก',
            'pea_dept_id.numeric' => 'ไอดีสำนักงานระดับแรกต้องเป็นตัวเลขเท่านั้น',
            'pea_dept_id.exists' => 'ไอดีสำนักงานระดับแรกไม่มีอยู่ในระบบ'
        ];
    }
}
