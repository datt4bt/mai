<?php
namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll();
    public function find($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);

}
