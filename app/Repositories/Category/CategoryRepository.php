<?php
namespace App\Repositories\Category;

use App\Repositories\EloquentRepository;
use Exception;
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
    public function getMaxId()
    {
        return $this->_model::max('id');
    }
    public function find($id)
    {
        return $this->_model->find($id);
    }
    public function findOrFail($id)
    {
        return $this->_model->findOrFail($id);
    }
    public function create($data)
    {
        return $this->_model->create($data);
    }
    public function update($data,$id)
    {
        try
        {
            return  $this->_model->findOrFail($id)->update($data);
        }
        catch(Exception $e)
        {

        }

    }

    public function delete($id)
    {

        return $this->find($id)->delete();
    }

}
