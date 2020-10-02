<?php

namespace App\Repositories\ImageProduct;

use App\Exceptions\RenderException;
use App\Repositories\EloquentRepository;
use Exception;
use Illuminate\Support\Carbon;
use App\Repositories\ImageProduct\ImageProductRepositoryInterface;

class ImageProductRepository extends EloquentRepository implements ImageProductRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\ImageProduct::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll()
    {
        return $this->_model->withoutRelations('product')->all();
    }

    public function find($id)
    {
        try {
            $task = $this->_model->findOrFail($id);
        } catch (\Exception $exception) {
            throw  new  RenderException($exception->getMessage());
        }
        return $task;
    }
    public function findUser($id)
    {
        try {
            $task = $this->_model::where('id_user', $id)->firstOrFail();
        } catch (\Exception $exception) {
            throw  new  RenderException($exception->getMessage());
        }
        return $task;
    }

    public function getOne($id)
    {
        return $this->_model::with('user')->with('category')->paginate(5);
    }

    public function show($id)
    {
        return $this->_model::withTrashed()->with('user')->with('category')->paginate(5);
    }

    public function findOrFail($id)
    {
        return $this->_model->findOrFail($id);
    }

    public function create($data)
    {
        return $this->_model->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->find($id);
        $model->fill($data);
        $model->save();
        return $model;
    }

    public function updateStatus($ids, $data)
    {
        $array = [];
        foreach ($ids as $id) {
            $status = in_array($id, $data);

            array_push($array, [
                'id' => $id,
                'status' => $status
            ]);
        }
        foreach ($array as $task) {
            $id = $task['id'];
            $data['status'] = $task['status'];
            $this->findOrFail($id)->update($data);
        }
    }

    public function delete($id)
    {

        return $this->find($id)->delete();
    }

}
