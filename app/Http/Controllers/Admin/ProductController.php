<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\ProductDetails;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $category;
    protected $product;
    protected $productDetail;
    public function __construct(Product $product, Category $category, ProductDetails $productDetail)
    {
        $this->product = $product;
        $this->category = $category;
        $this->productDetail = $productDetail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->orderByDesc('id')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get(['id', 'name']);
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $dataCreate = $request->except('sizes');
        $sizes = $request->sizes ? json_decode($request->sizes, true) : []; // Chuyển đổi thành mảng dữ liệu

        $product = Product::create($dataCreate);
        $dataCreate['image'] = $this->product->saveImage($request);

        $product->images()->create(['url' => $dataCreate['image']]);
        $product->categories()->attach($dataCreate['category_id']);
        $sizeArray = [];
        foreach ($sizes as $size) {
            $sizeArray[] = ['size' => $size['size'], 'quantity' => $size['quantity'], 'product_id' => $product->id];
        }

        $this->productDetail->insert($sizeArray);
        return redirect()->route('products.index')->with(['message' => 'Thêm mới sản phẩm thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->with(['productDetails', 'categories'])->findOrFail($id);
        $categories = $this->category->get(['id', 'name']);

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        // Lấy thông tin sản phẩm từ ID
        $product = $this->product->findOrFail($id);

        // Lấy thông tin chi tiết sản phẩm mới từ request
        $dataUpdate = $request->except('sizes');
        $sizes = $request->sizes ? json_decode($request->sizes, true) : [];

        // Cập nhật ảnh đại diện sản phẩm
        $currentImage = $product->images ? $product->images->url : '';
        $dataUpdate['image'] = $this->product->updateImage($request, $currentImage);

        // Cập nhật thông tin sản phẩm trong bảng 'products'
        $product->update($dataUpdate);

        // Cập nhật danh mục liên kết đến sản phẩm
        $product->categories()->sync($dataUpdate['category_id']);





        // Tạo mảng mới chứa thông tin chi tiết sản phẩm
        $sizeArray = [];
        foreach ($sizes as $size) {
            $sizeArray[] = ['size' => $size['size'], 'quantity' => $size['quantity'], 'product_id' => $product->id];
        }
        dd($dataUpdate, $sizeArray);
        // Xóa các bản ghi cũ liên quan đến sản phẩm trong bảng 'product_details'
        $product->productDetails()->delete();

        // Thêm mới các bản ghi từ 'sizeArray' vào bảng 'product_details'
        $this->productDetail->insert($sizeArray);

        return redirect()->route('products.index')->with(['message' => 'Cập nhật sản phẩm thành công']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);
        $product->delete();
        $product->productDetails()->delete();
        $imageName = $product->images ? $product->images->url : '';

        $this->product->deleteImage($imageName);

        return redirect()->route('products.index')->with(['message' => 'Xóa sản phẩm thành công']);
    }
}
