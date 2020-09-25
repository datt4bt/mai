<?php
namespace App\Repositories\Task;

use App\Repositories\EloquentRepository;
use Exception;
use Illuminate\Support\Carbon;
use App\Repositories\Task\TaskRepositoryInterface;
class TaskRepository extends EloquentRepository implements TaskRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Task::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll()
    {
        return $this->_model::with('user')->with('category')->where('id_user',$id)->get();
    }
    public function getMaxId()
    {
        return $this->_model::max('id');
    }
    public function find($id)
    {
        return $this->_model->find($id);
    }
    public function getOne($id)
    {
        return $this->_model::with('user')->with('category')->where('id_user',$id)->get();
    }
    public function findOrFail($id)
    {
        return $this->_model->findOrFail($id);
    }
    public function check($idUser,$idCategory)
    {
        return $this->_model->where('id_user',$idUser)->where('id_category',$idCategory)->firstOrFail();
    }
    public function create($data)
    {
        return $this->_model->create($data);
    }
    public function update($id,$data)
    {
        return  $this->find($id)->update($data);
    }

    public function delete($id)
    {

        return $this->find($id)->delete();
    }

}
