<?php

namespace App\Http\Requests\PEADept;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePEAThirdDepartmentRequest extends FormRequest
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
                Rule::exists('pea_second_departments', 'id')->whereNull('deleted_at')
            ],
            'name' => [
                'required',
                Rule::unique('pea_third_departments', 'name')->whereNull('deleted_at')
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณาใส่ชื่อสำนักงาน',
            'name.unique' => 'ชื่อสำนักงานมีอยู่ในระบบแล้ว',
            'pea_dept_id.required' => 'กรุณาระบุไอดีสำนักงานระดับสอง',
            'pea_dept_id.numeric' => 'ไอดีสำนักงานระดับสองต้องเป็นตัวเลขเท่านั้น',
            'pea_dept_id.exists' => 'ไอดีสำนักงานระดับสองไม่มีอยู่ในระบบ'
        ];
    }
}
