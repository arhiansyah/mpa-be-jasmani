<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ExerciseSessionRepositoryInterface.
 */
interface ExerciseSessionRepositoryInterface
{
    public function getAll();
    public function getPaginate($limit);
    public function getById($id);
    public function create(array $attributes);
    public function edit($id, array $attributes);
    public function delete($id);
    public function limitOffset($limit, $offset);
    public function attachGroupTraining($id, $attributes);
    public function syncGroupTraining($id, $attributes);
}
