<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\ImageProduct;
use App\Repositories\ImageProduct\ImageProductRepositoryInterface;
use App\Repositories\ImageProduct\ImageProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;

class ImageProductController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param int $id
     * @return View
     */

    /**
     * @var imageProductRepositoryInterface|\App\Repositories\Repository
     */

    /**
     * @var ImageProductRepositoryInterface
     */
    private $imageProductRepository;
    private $productRepository;

    public function __construct(ImageProductRepositoryInterface $imageProductRepository, ProductRepositoryInterface $productRepository)
    {
        $this->imageProductRepository = $imageProductRepository;
        $this->productRepository = $productRepository;

    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $imageProducts = $this->imageProductRepository->getAll();
        return view('admin.ImageProduct.viewAll', compact('imageProducts'));
    }


    public function insert()
    {
        $products = $this->productRepository->getAll();
        return view('admin.ImageProduct.insert', compact('products'));
    }

    public function processInsert(Request $request)
    {

        foreach ($request->file('picture') as $name) {

            $link = Storage::disk('public')->put('anh_san_pham', $name);
            $data = $request->all();
            $data['name'] = $link;
            unset($data['picture']);
            $this->imageProductRepository->create($data);
        }
        return redirect()->route('page_admin.image_product.getAll');

    }


    function delete(Request $request)
    {
        try {
            $id = $request->id;
            $imageProduct = $this->imageProductRepository->findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(["success" => false, 'message' => $e->getMessage()], 400);
        }
        Storage::disk('public')->delete('anh', $imageProduct->name);
        $imageProduct->delete();
        return response()->json(['success' => '']);
    }

}
