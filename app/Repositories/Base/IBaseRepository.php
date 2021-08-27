<?php


namespace App\Repositories\Base;


interface IBaseRepository
{
    public function create($data);

    public function read();

    public function all();

    public function update();

    public function delete();
}
