<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\InsertProductRequest;
use Validator;
use Hash;
use Exception;
use Dingo\Api\Routing\Helpers;

class ProductController extends Controller
{
    use Helpers;

    /**
     * Show the profile for the given user.
     *
     * @param int $id
     * @return View
     */

    /**
     * @var productRepositoryInterface|\App\Repositories\Repository
     */
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $products = $this->productRepository->getAll();
        return view('admin.Product.viewAll', compact('products'));
    }


    public function insert()
    {

        return view('admin.Product.insert');
    }

    public function processInsert(InsertProductRequest $request)
    {
        $request->validated();
        $data = $request->all();
        $link = Storage::disk('public')->put('anh', $request->picture);
        $data['picture'] = $link;
        $this->productRepository->create($data);
        return redirect()->route('page_admin.product.getAll');
    }

    public function update($id)
    {
        $product = $this->productRepository->find($id);
        return view('admin.Product.update', compact('product'));
    }

    public function processUpdate(ProductStoreRequest $request, $id)
    {
        $request->validated();
        $data = $request->all();
        $product = $this->productRepository->find($id);
        if ($product->name == $request->name) {
            unset($data['name']);

        } else {
            $count = Product::where('name', $request->name)->count();
            if ($count == 1) {
                return redirect()->route('page_admin.product.update', ['id' => $id])->with('error_name', "Tên Sản phẩm đã tồn tại");
            }
        }
        Storage::disk('public')->delete('anh', $product->picture);
        $link = Storage::disk('public')->put('anh', $request->picture);
        $data['picture'] = $link;
        $this->productRepository->update($id, $data);
        return redirect()->route('page_admin.product.getAll');

    }

    public function delete(Request $request)
    {

        try {
            $id = $request->id;
            $product = $this->productRepository->findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(["success" => false, 'message' => $e->getMessage()], 400);
        }
        Storage::disk('public')->delete('anh', $product->picture);
        $product->delete();
        return response()->json(['success' => '']);
    }
}
