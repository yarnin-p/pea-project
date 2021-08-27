<?php


namespace App\Services\PEADept;


use App\Models\PEADept;
use App\Repositories\Base\BaseRepository;
use App\Repositories\PEADept\IPEADeptRepository;
use App\Repositories\PEADept\PEADeptRepository;

class PEAService implements IPEAService
{

    /**
     * @var IPEADeptRepository
     */
    private IPEADeptRepository $PEADeptRepository;

    /**
     * PEAService constructor.
     * @param IPEADeptRepository $PEADeptRepository
     */
    public function __construct(IPEADeptRepository $PEADeptRepository)
    {
        $this->PEADeptRepository = $PEADeptRepository;
    }

    public function listPEADept()
    {
        return $this->PEADeptRepository->getPEAAllLevelDept();
    }
}
