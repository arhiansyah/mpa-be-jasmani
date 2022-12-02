<?php 
    
namespace App\Repositories\Eloquent;

use App\Models\Curriculum;
use App\Repositories\CurriculumRepositoryInterface;

class CurriculumRepository implements CurriculumRepositoryInterface{
    
    private $model;
    public function __construct(Curriculum $curriculum)
    {
        $this->model = $curriculum;
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
        $curriculum = $this->model->findOrFail($id);
        $curriculum->update($attributes);
        return $curriculum;
    }
    public function delete($id){
        return $this->model->where('id', $id)->delete($id);
    }

    public function attachSubject($id, $attributes)
    {
        $curriculum = $this->model->findOrFail($id);
        return $curriculum->subject()->attach($attributes);
    }

    public function syncSubject($id, $attributes)
    {
        $curriculum = $this->model->findOrFail($id);
        return $curriculum->subject()->sync($attributes);
    }
}