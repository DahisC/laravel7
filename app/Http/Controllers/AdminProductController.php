<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use App\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index(Request $request) {
        // dd($request->query());
        // $productList = Product::with('type')->with('images')->get();
        $qs_type = $request->query()['type'] ?? 'all';
        $productList = [];
        $productTypeList = ProductType::get();

        if ($qs_type != 'all') {
            $productList = Product::with('type')->whereHas('type', function($q) use ($qs_type) {
                $q->where('type', $qs_type);
            })->get();
        } else {
            $productList = Product::get();
        }
        // dd(ProductType::with('product')->where('type', $request->query()['type'])->get());
        return view('admin.product.index', compact('productList', 'productTypeList', 'qs_type'));
    }
    public function create() {
        $action = 'Create';
        $productTypeList = ProductType::get();
        return view('admin.product.factory', compact('action', 'productTypeList'));
    }
    public function store(Request $request) {
        $product = Product::create($request->all());
        $this->storeImages($request, $product->id);
        return redirect()->route('admin.product.index');
    }
    public function edit($id) {
        $action = 'Edit';
        $product = Product::with('images')->find($id);
        $productTypeList = ProductType::get();
        return view('admin.product.factory', compact('action', 'product', 'productTypeList'));
    }
    public function update(Request $request, $id) {
        $product = Product::find($id);
        $this->storeImages($request, $product->id);
        $updateResult = $product->update($request->all());
        if ($updateResult) return redirect()->route('admin.product.edit', ['product' => $id]);
    }
    public function destroy($id) {
        // $deleteResult = Product::find($id)->delete();
        ProductImages::where('product_id', $id)->delete();
        $deleteResult = Product::destroy($id);
        if ($deleteResult) return redirect()->route('admin.product.index');
    }
    public function deleteImage($id) {
        $productImage = ProductImages::find($id);
        $path = $productImage->url;
        $productId = $productImage->product_id;
        ProductImages::destroy($id);
        File::delete(public_path($path));
        return response()->json(ProductImages::where('product_id', $productId)->get());
    }
    // public function storeImage($file) {
    //     // Storage::put('/public/product/test.jpg', file_get_contents($file));
    //     return Storage::putFile('/public/product', $file);
    // }
    public function storeImages($request, $productId) {
        if (!empty($request->file('images'))) {
            $files = $request->file('images');
            // $product = Product::create($request->all());
            foreach ($files as $file) {
                $path = Storage::putFile('/public/product', $file);
                ProductImages::create([
                    'product_id' => $productId,
                    'url' => Storage::url($path)
                ]);
            }
        }
    }
}
