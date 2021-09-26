<?php

namespace App\Http\Requests\Dimension;

use App\Models\PEADept;
use App\Models\PEASecondDept;
use App\Models\PEAThirdDept;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSecondDimensionRequest extends FormRequest
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
        $rules = [
            'pea_dept_id' => ['required', 'numeric',],
            'dimension_parent_id' => ['min:0', 'numeric'],
            'level_dept' => ['required', 'in:first,second,third'],
            'name' => [
                'required',
                Rule::unique('second_dimensions', 'name'),
            ],
            'raw_data' => ['required']
        ];

        if ($this->request->get('dimension_parent_id') != '' && $this->request->get('dimension_parent_id') > 0) {
            array_push($rules['dimension_parent_id'], Rule::exists('second_dimensions', 'id'));
        } else {
            array_push($rules['dimension_parent_id'], 'required');
        }

        $isPEADeptExist = false;
        if ($this->request->get('pea_dept_id') != '') {
            if (PEADept::where('id', $this->request->get('pea_dept_id'))->first()
                || PEASecondDept::where('id', $this->request->get('pea_dept_id'))->first()
                || PEAThirdDept::where('id', $this->request->get('pea_dept_id'))->first()) {
                $isPEADeptExist = true;
            } else {
                array_push($rules['dimension_parent_id'], 'required');
            }

            if (!$isPEADeptExist) {
                array_push($rules['pea_dept_id'], Rule::exists('pea_departments', 'id')->whereNull('deleted_at'));
            }
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณาระบุชื่อมิติ',
            'name.unique' => 'มิติมีอยู่ในระบบแล้ว',
            'pea_dept_id.required' => 'กรุณาระบุไอดีสำนักงาน',
            'pea_dept_id.numeric' => 'ไอดีสำนักงานต้องเป็นตัวเลขเท่านั้น',
            'pea_dept_id.exists' => 'ไอดีสำนักงานไม่มีอยู่ในระบบ',
            'dimension_parent_id.min' => 'Dimension parent ID ต้องมีค่าอย่างน้อยคือ 0',
            'dimension_parent_id.numeric' => 'Dimension parent ID ต้องเป็นตัวเลขเท่านั้น',
            'dimension_parent_id.required' => 'กรุณาระบุ Dimension parent ID',
            'dimension_parent_id.exists' => 'Dimension parent ไม่มีอยู่ในระบบ',
            'level_dept.required' => 'กรุณาระบุระดับสำนักงาน',
            'level_dept.in' => 'ระดับสำนักงาน(level_dept) ต้องมีค่าเป็น first, second หรือ third เท่านั้น',
            'raw_data.required' => 'กรุณาระบุข้อมูล raw data',
        ];
    }
}
