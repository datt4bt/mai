<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll();
    public function getOne($id);
    public function find($id);
    public function findOrFail($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);

}
