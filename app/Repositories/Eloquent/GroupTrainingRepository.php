<?php

namespace App\Repositories\Eloquent;

use App\Models\GroupTraining;
use App\Repositories\GroupTrainingRepositoryInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class GroupTrainingRepository.
 */
class GroupTrainingRepository implements GroupTrainingRepositoryInterface
{
    private $model;

    public function __construct(GroupTraining $groupTraining)
    {
        $this->model = $groupTraining;
    }
    public function getAll()
    {
        return $this->model->all();
    }
    public function getPaginate($limit)
    {
        return $this->model->paginate($limit);
    }
    public function getById($id)
    {
        return $this->model->find($id);
    }
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }
    public function edit($id, array $attributes)
    {
        $program = $this->model->findOrFail($id);
        $program->update($attributes);
        return $program;
    }
    public function delete($id)
    {
        return $this->model->where('id', $id)->delete($id);
    }

    public function limitOffset($limit, $offset)
    {
        return $this->model->limit($limit)->offset($offset)->get();
    }

    public function attachTraining($id, $attributes)
    {
        $groupTraining = $this->model->findOrFail($id);
        return $groupTraining->training()->attach($attributes);
    }

    public function syncTraining($id, $attributes)
    {
        $groupTraining = $this->model->findOrFail($id);
        return $groupTraining->training()->sync($attributes);
    }
}
