<?php
namespace App\Repositories\Task;

interface TaskRepositoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll();
    public function getOne($id);
    public function checkPassword($id,$dt);
    public function find($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);

}
