<?php
namespace App\Repositories\User;
use App\Exceptions\RenderException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;
use App\Repositories\User\UserRepositoryInterface;
use Exception;
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

    public function getOne($id)
    {
        return $this->_model::where('id',$id)->get();
    }

    public function find($id)
    {
        try {
            $user = $this->_model->findOrFail($id);
        }
        catch (\Exception $exception)
        {
            throw  new  RenderException($exception->getMessage());
        }
        return $user;
    }

    public function findOrFail($id)
    {
        return $this->_model->findOrFail($id);
    }

    public function create($data)
    {
        return $this->_model->create($data);
    }

    public function update($id,$data)
    {
        $model = $this->findOrFail($id);
        $model->fill($data);
        $model->save();
        return $model;
    }

    public function delete($id)
    {
        $model= $this->find($id);
        $model->delete();
        return  $model;
    }

}
