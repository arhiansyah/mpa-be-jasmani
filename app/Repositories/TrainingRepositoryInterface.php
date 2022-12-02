<?php 
    
namespace App\Repositories;

interface TrainingRepositoryInterface{
    public function getAll();
    public function getPaginate($limit);
    public function getById($id);
    public function create(array $attributes);
    public function edit($id, array $attributes);
    public function delete($id);
    public function attachExercise($id, $attributes);
    public function syncExercise($id, $attributes);
}