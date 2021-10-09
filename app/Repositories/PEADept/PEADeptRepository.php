<?php


namespace App\Repositories\PEADept;

use App\Models\PEADept;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class PEADeptRepository extends BaseRepository implements IPEADeptRepository
{
    private PEADept $PEADept;

    public function __construct(PEADept $PEADept)
    {
        parent::__construct($PEADept);
        $this->PEADept = $PEADept;
    }

    public function getPEAAllLevelDept()
    {
        /*
         * select * from pea_departments join (select id, pea_dept_id, name from pea_second_departments) as pea_second_departments
         * on pea_departments.id = pea_second_departments.pea_dept_id
         * join (select id, pea_dept_id, name from pea_third_departments) as pea_third_departments
         * on pea_second_departments.id = pea_third_departments.pea_dept_id
         */

        return $this->PEADept::with(['PEASecondDepts' => function ($PEASecondQuery) {
            $PEASecondQuery->select('id', 'dept_code', 'pea_dept_id', 'name')
                ->with(['PEAThirdDepts' => function ($PEAThirdQuery) {
                    $PEAThirdQuery->select('id', 'dept_code', 'pea_dept_id', 'name');
                }]);
        }])->get();
    }
}
