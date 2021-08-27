<?php


namespace App\Repositories\Base;


use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        return $data->save();
    }

    public function read()
    {
        return;
    }

    public function all()
    {
        return $this->model::all();
    }

    public function update()
    {
        return $this->model::update();
    }

    public function delete()
    {
        return $this->model::delete();
    }
}
