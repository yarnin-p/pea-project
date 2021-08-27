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
        return $this->PEADept::with(['PEASecondDepts' => function ($PEASecondQuery) {
            $PEASecondQuery->select('id', 'pea_dept_id', 'name')
                ->with(['PEAThirdDepts' => function ($PEAThirdQuery) {
                    $PEAThirdQuery->select('id', 'pea_dept_id', 'name');
                }]);
        }])->get();
    }
}
