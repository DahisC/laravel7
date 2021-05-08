<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    public function index() {
        $newsList = News::get();
        return view('admin.news.index', compact('newsList'));
    }
    public function create() {
        $action = 'Create';
        return view('admin.news.factory', compact('action'));
    }
    public function store(Request $request) {
        News::create($request->all());
        return redirect('/admin/news');
    }
    public function edit($id) {
        $action = 'Edit';
        $news = News::find($id);
        return view('admin.news.factory', compact('action', 'news'));
    }
    public function update(Request $request, $id) {
        $updateResult = News::find($id)->update($request->all());
        if ($updateResult) return redirect("/admin/news");
    }
    public function destroy($id) {
        $deleteResult = News::find($id)->delete();
        if ($deleteResult) return redirect('/admin/news');
    }
}
