<?php 

namespace App\Repositories;

interface UserRepositoryInterface{
    public function getAll();
    public function getById($id);
    public function create(array $attributes);
    public function edit($id, array $attributes);
    public function delete($id);
}