<?php 

namespace App\Repositories\Eloquent;

use App\Models\ProgramStudy;
use App\Repositories\ProgramRepositoryInterface;

class ProgramRepository implements ProgramRepositoryInterface{
    private $model;
    public function __construct(ProgramStudy $program)
    {
        $this->model = $program;
    }
    public function getAll(){
        return $this->model->all();
    }
    public function getPaginate($limit)
    {
        return $this->model->paginate($limit);
    }
    public function getById($id){
        return $this->model->find($id);
    }
    public function create(array $attributes){
        return $this->model->create($attributes);
    }
    public function edit($id, array $attributes){
        $program = $this->model->findOrFail($id);
        $program->update($attributes);
        return $program;
    }
    public function delete($id){
        return $this->model->where('id', $id)->delete($id);
    }

    public function limitOffset($limit, $offset)
    {
        return $this->model->limit($limit)->offset($offset)->get();
    }
}
