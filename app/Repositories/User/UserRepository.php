<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;
use App\Repositories\User\UserRepositoryInterface;
class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\User::class;
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
    public function findOrFail($id)
    {
        return $this->_model->findOrFail($id);
    }
    public function checkPassword($id,$oldPassword)
    {
        return $this->_model->where('id',$id)->where('password',$oldPassword);
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
        return   $this->find($id)->delete();
    }

}
