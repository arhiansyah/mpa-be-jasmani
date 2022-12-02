<?php 

namespace App\Repositories\Eloquent;

use App\Models\Exercise;
use App\Repositories\ExerciseRepositoryInterface;

class ExerciseRepository implements ExerciseRepositoryInterface{
    private $model;
    public function __construct(Exercise $exercise)
    {
        $this->model = $exercise;
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
        $exercise = $this->model->findOrFail($id);
        $exercise->update($attributes);
        return $exercise;
    }
    public function delete($id){
        return $this->model->where('id', $id)->delete($id);
    }

    public function limitOffset($limit, $offset)
    {
        return $this->model->limit($limit)->offset($offset)->get();
    }
}
