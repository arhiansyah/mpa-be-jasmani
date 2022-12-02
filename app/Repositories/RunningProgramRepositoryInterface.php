<?php 

namespace App\Repositories;

interface RunningProgramRepositoryInterface{
    public function getAll();
    public function getPaginate($limit);
    public function getById($id);
    public function create(array $attributes);
    public function edit($id, array $attributes);
    public function delete($id);
}