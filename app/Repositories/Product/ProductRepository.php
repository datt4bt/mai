<?php

namespace App\Repositories\Product;

use App\Exceptions\RenderException;
use App\Repositories\EloquentRepository;
use Exception;
use Illuminate\Support\Carbon;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository extends EloquentRepository implements ProductRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Product::class;
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
        try {
            $category = $this->_model->findOrFail($id);
        } catch (\Exception $exception) {
            throw  new  RenderException($exception->getMessage());
        }
        return $category;
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
        $category = $this->find($id);
        $category->fill($data);
        $category->save();
        return $category;
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }

}
