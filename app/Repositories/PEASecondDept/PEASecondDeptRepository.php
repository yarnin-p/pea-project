<?php


namespace App\Repositories\PEASecondDept;

use App\Models\PEADept;
use App\Repositories\Base\BaseRepository;
use App\Repositories\PEASecondDept\IPEASecondDeptRepository;
use Illuminate\Database\Eloquent\Model;

class PEASecondDeptRepository extends BaseRepository implements IPEASecondDeptRepository
{
    private PEADept $PEADept;

    public function __construct(PEADept $PEADept)
    {
        parent::__construct($PEADept);
        $this->PEADept = $PEADept;
    }

    public function getPEASecondDept()
    {
        return $this->PEADept::with(['PEASecondDepts' => function ($PEASecondQuery) {
            $PEASecondQuery->select('id', 'pea_dept_id', 'name')
                ->with(['PEAThirdDepts' => function ($PEAThirdQuery) {
                    $PEAThirdQuery->select('id', 'pea_dept_id', 'name');
                }]);
        }])->get();
    }
}
