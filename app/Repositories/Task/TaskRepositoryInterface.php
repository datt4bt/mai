<?php
namespace App\Repositories\Task;

interface TaskRepositoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll();
    public function show($id);
    public function getOne($id);
    public function find($id);
    public function findUser($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);

}
