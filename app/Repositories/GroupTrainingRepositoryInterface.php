<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class GroupTrainingRepositoryInterface.
 */
interface GroupTrainingRepositoryInterface
{
    public function getAll();
    public function getPaginate($limit);
    public function getById($id);
    public function create(array $attributes);
    public function edit($id, array $attributes);
    public function delete($id);
    public function attachTraining($id, $attributes);
    public function syncTraining($id, $attributes);
}
