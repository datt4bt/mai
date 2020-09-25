<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Requests\Category\CategoryStoreRequest;
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
        $arrayCategory = $this->categoryRepository->getMaxId();
        $id=$this->categoryRepository->create($data);
        //return response()->json(['success' => true,'message'=>$id]);
        return redirect()->route('category.getAll');
    }

    public function update($id)
    {
        $category = $this->categoryRepository->find($id);

        return view('category.update', compact('category'));
    }

    public function processUpdate(CategoryStoreRequest $request, $id)
    {
        //... Validation here
        $request->validated();
        $data = $request->all();

        $this->categoryRepository->update($id, $data);
        //Category::where('id',$id)->update($data);
        return redirect()->route('category.getAll');
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->id;
            $category = $this->categoryRepository->findOrFail($id);

        } catch (\Exception $e) {
            return response()->json(["success" => false, 'message' => $e->getMessage()], 400);
        }
        $category->delete();
        return response()->json(['success' => '']);


    }
}
