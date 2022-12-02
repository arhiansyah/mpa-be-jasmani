<?php

namespace App\Repositories\Eloquent;

use App\Models\ExerciseSession;
use App\Repositories\ExerciseSessionRepositoryInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ExerciseSessionRepository.
 */
class ExerciseSessionRepository implements ExerciseSessionRepositoryInterface
{
    private $model;
    public function __construct(ExerciseSession $exerciseSession)
    {
        $this->model = $exerciseSession;
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
        $exercise = $this->model->findOrFail($id);
        $exercise->update($attributes);
        return $exercise;
    }
    public function delete($id)
    {
        return $this->model->where('id', $id)->delete($id);
    }

    public function limitOffset($limit, $offset)
    {
        return $this->model->limit($limit)->offset($offset)->get();
    }

    public function attachGroupTraining($id, $attributes)
    {
        $exerciseSession = $this->model->findOrFail($id);
        return $exerciseSession->GroupTraining()->attach($attributes);
    }

    public function syncGroupTraining($id, $attributes)
    {
        $groupTraining = $this->model->findOrFail($id);
        return $groupTraining->GroupTraining()->sync($attributes);
    }
}
