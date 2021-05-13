<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index() {
        $productList = Product::with('type')->get();
        return view('admin.product.index', compact('productList'));
    }
    public function create() {
        $action = 'Create';
        $productTypeList = ProductType::get();
        return view('admin.product.factory', compact('action', 'productTypeList'));
    }
    public function store(Request $request) {
        // $path = $this->storeImage($request->file('uploaded_img'));
        Product::create($request->all());
        return redirect()->route('admin.product.index');
    }
    public function edit($id) {
        $action = 'Edit';
        $product = Product::find($id);
        $productTypeList = ProductType::get();
        return view('admin.product.factory', compact('action', 'product', 'productTypeList'));
    }
    public function update(Request $request, $id) {
        $updateResult = Product::find($id)->update($request->all());
        if ($updateResult) return redirect()->route('admin.product.index');
    }
    public function destroy($id) {
        // $deleteResult = Product::find($id)->delete();
        $deleteResult = Product::destroy($id);
        if ($deleteResult) return redirect()->route('admin.product.index');
    }
    // public function storeImage($file) {
    //     // Storage::put('/public/product/test.jpg', file_get_contents($file));
    //     return Storage::putFile('/public/product', $file);
    // }
}
