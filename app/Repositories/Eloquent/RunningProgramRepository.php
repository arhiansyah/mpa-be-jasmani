<?php 
    
namespace App\Repositories\Eloquent;

use App\Models\RunningProgram;
use App\Repositories\RunningProgramRepositoryInterface;

class RunningProgramRepository implements RunningProgramRepositoryInterface{

    private $model;
    public function __construct(RunningProgram $runpro)
    {
        $this->model = $runpro;
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
        $runningprogram = $this->model->findOrFail($id);
        $runningprogram->update($attributes);
        return $runningprogram;
    }
    public function delete($id){
        return $this->model->where('id', $id)->delete($id);
    }
}