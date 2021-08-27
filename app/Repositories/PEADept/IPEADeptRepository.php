<?php


namespace App\Repositories\PEADept;


use App\Repositories\Base\IBaseRepository;

interface IPEADeptRepository extends IBaseRepository
{
    public function getPEAAllLevelDept();
}
