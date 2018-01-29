<?php

namespace App\Repositories;

use Illuminate\Support\Facades\App;

abstract class BaseRepository
{
    protected $model;
    
    public function setModel($model)
    {
        $this->model = App::make($model);
    }
    
    public function all($with = [], $columns = ['*'])
    {
        return $this->model->with($with)
                           ->get($columns);
    }
    
    public function find($id, $with = [], $columns = ['*'])
    {
        return $this->model->with($with)
                           ->where('id', $id)
                           ->first($columns);
    }
    
    public function update($id, $update_data = [])
    {
        return $this->model->where('id', $id)
                           ->update($update_data);
    }
    
    public function create($data_insert)
    {
        return $this->model->create($data_insert);
    }
    
    public function delete($id)
    {
        return $this->model->where('id', $id)
                           ->delete();
    }
    
    public function findByColumns($where, $with = [])
    {
        return $this->model->with($with)
                           ->where($where)
                           ->get();
    }
    
    public function findByColumnsFirst($where, $with = [])
    {
        return $this->model->with($with)
                           ->where($where)
                           ->first();
    }
}