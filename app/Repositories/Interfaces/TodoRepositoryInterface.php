<?php
namespace App\Repositories\Interfaces;

Interface TodoRepositoryInterface{

    public function allTodo();
    public function storeTodo($data);
    public function findTodo($id);
    public function updateTodo($data, $id);
    public function destroyTodo($id);
}
