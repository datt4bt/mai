<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Requests\CategoryStoreRequest;
use Validator;
class CategoryController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
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
        $arrayCategory = $this->categoryRepository->getAll();

        return view('category.viewAll', compact('arrayCategory'));
    }
    public function insert()
    {
        return view('category.insert');
    }
    public function processInsert(CategoryStoreRequest $request)
    {
        $data = $request->all();

        //... Validation here

        $this->categoryRepository->create($data);

        return redirect()->route('category.getAll');
    }
    public function update($id)
    {
        $category = $this->categoryRepository->find($id);

        return view('category.update', compact('category'));
    }
    public function processUpdate(CategoryStoreRequest $request,$id)
    {  $data = $request->all();

        //... Validation here

        $this->categoryRepository->update($id, $data);

        return redirect()->route('category.getAll');
    }
    public function delete($id)
    {
      $this->categoryRepository->delete($id);

      return redirect()->route('category.getAll');
    }
}
