<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use App\ProductImages;
use Illuminate\Http\Request;
use App\ProductsTypesConnect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    public function index(Request $request) {
        // dd($request->query());
        // $productList = Product::with('type')->with('images')->get();
        $qs_type = $request->type ?? 'all';
        $productList = [];
        $productTypeList = ProductType::get();
        // DB::enableQueryLog();
        if ($qs_type != 'all') {
            $productList = Product::with('types')->whereHas('types', function($q) use ($qs_type) {
                $q->where('type_id', $qs_type);
            })->get();
            // $productList = Product::with('type')->whereHas('test', function($q) use ($qs_type) {
            //     $q->where('id', $qs_type);
            // })->get();
            dd(DB::getQueryLog());
        } else {
            $productList = Product::with('types')->get();
        }
        return view('admin.product.index', compact('productList', 'productTypeList', 'qs_type'));
    }
    public function create() {
        $action = 'Create';
        $productTypeList = ProductType::get();
        return view('admin.product.factory', compact('action', 'productTypeList'));
    }
    public function store(Request $request) {
        $product = Product::create($request->all());
        foreach ($request->input('type_id') as $type_id) {
            ProductsTypesConnect::create([
                'product_id' => $product->id,
                'type_id' => $type_id
            ]);
        }
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
