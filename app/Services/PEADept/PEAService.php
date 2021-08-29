<?php


namespace App\Services\PEADept;

use App\Repositories\PEADept\IPEADeptRepository;
use Illuminate\Database\QueryException;

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
    public function listAllPEADept()
    {
        try {
            $PEAData = $this->PEADeptRepository->getPEAAllLevelDept();
        } catch (QueryException $exception) {
            throw new QueryException('', [], $exception);
        }

        return $PEAData;
    }

    public function listPEADept()
    {
        try {
            $PEAData = $this->PEADeptRepository->all();
        } catch (QueryException $exception) {
            throw new QueryException('', [], $exception);
        }
        return $PEAData;
    }
}
