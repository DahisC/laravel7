<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;

class AdminProductTypeController extends Controller
{
    public function index() {
        $productTypeList = ProductType::get();
        return view('admin.product.type.index', compact('productTypeList'));
    }
    public function create() {
        $action = 'Create';
        return view('admin.product.type.factory', compact('action'));
    }
    public function store(Request $request) {
        ProductType::create($request->all());
        return redirect()->route('admin.product.type.index');
    }
    // public function edit($id) {
    //     $action = 'Edit';
    //     $news = News::find($id);
    //     return view('admin.news.factory', compact('action', 'news'));
    // }
    // public function update(Request $request, $id) {
    //     $updateResult = News::find($id)->update($request->all());
    //     if ($updateResult) return redirect()->route('admin.news.index');
    // }
    // public function destroy($id) {
    //     $targerProduct = News::find($id);
    //     File::delete($targerProduct->img);
    //     $deleteResult = $targerProduct->delete();
    //     if ($deleteResult) return redirect()->route('admin.news.index');
    // }
}
