<?php


namespace App\Services\PEADept;


use App\Models\PEADept;
use App\Repositories\Base\BaseRepository;
use App\Repositories\PEADept\IPEADeptRepository;
use App\Repositories\PEADept\PEADeptRepository;
use http\Exception\BadMessageException;

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

    /**
     * @return mixed
     * @throws \Exception
     */
    public function listPEADept()
    {
        try {
            $PEAData = $this->PEADeptRepository->getPEAAllLevelDept();
        } catch (\Illuminate\Database\QueryException $exception) {
            throw new \Illuminate\Database\QueryException('', [], $exception);
        }
        return $PEAData;
    }
}
