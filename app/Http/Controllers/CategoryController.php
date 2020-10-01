<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\InsertCategoryRequest;
use Validator;
use Hash;
use Dingo\Api\Routing\Helpers;

class CategoryController extends Controller
{
    use Helpers;

    /**
     * Show the profile for the given user.
     *
     * @param int $id
     * @return View
     */

    /**
     * @var categoryRepositoryInterface|\App\Repositories\Repository
     */
    protected $userRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $categorys = $this->categoryRepository->getAll();
        return CategoryResource::collection($categorys);
    }

    public function show()
    {
        $category = $this->categoryRepository->show();
        return CategoryResource::collection($category);
    }

    public function insert()
    {

        return view('category.insert');
    }

    public function processInsert(InsertCategoryRequest $request)
    {
        $request->validated();
        $data = $request->all();
        $category = $this->categoryRepository->create($data);
        return new CategoryResource($category);
    }

    public function update($id)
    {
        $category = $this->categoryRepository->find($id);
        return view('category.update', compact('category'));
    }

    public function processUpdate(CategoryStoreRequest $request, $id)
    {
        $request->validated();
        $data = $request->all();
        $category = $this->categoryRepository->update($id, $data);
        return new CategoryResource($category);
    }

    public function delete($id)
    {
        $category = $this->categoryRepository->delete($id);
        return response()->json(['result' => $category]);
//        try {
//            $id = $request->id;
//            $category = $this->categoryRepository->findOrFail($id);
//
//        } catch (\Exception $e) {
//            return response()->json(["success" => false, 'message' => $e->getMessage()], 400);
//        }
//        $category->delete();
//        return response()->json(['success' => '']);
    }
}
