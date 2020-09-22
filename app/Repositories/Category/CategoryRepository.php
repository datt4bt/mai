<?php
namespace App\Repositories\Category;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;
use App\Repositories\Category\CategoryRepositoryInterface;
class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll()
    {
        return $this->_model::all();
    }
    public function find($id)
    {
        return $this->_model->find($id);
    }
    public function create($data)
    {
        return $this->_model->create($data);
    }
    public function update($data,$id)
    {
        return  $this->find($id)->update($data);
    }
    public function delete($id)
    {
        return   $this->find($id)->delete();
    }

}
