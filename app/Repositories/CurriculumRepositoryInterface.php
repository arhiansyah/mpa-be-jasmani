<?php 
    
namespace App\Repositories;

interface CurriculumRepositoryInterface{
    public function getAll();
    public function getPaginate($limit);
    public function getById($id);
    public function create(array $attributes);
    public function edit($id, array $attributes);
    public function delete($id);
    public function attachSubject($id, $attributes);
    public function syncSubject($id, $attributes);
}