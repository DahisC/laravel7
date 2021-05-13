<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsResourceController extends Controller {
    public function index() {
        $newsList = News::get();
        return view('news.index', compact('newsList'));
    }
    public function show($id) {
        $news = News::find($id);
        return view('news.content', compact('news'));
    }
    public function create() {
        return view('news.create', ['method' => 'POST', 'submit_btn' => '新增文章']);
    }
    public function store(Request $request) {
        News::create($request->all());
        return redirect('/news');
    }
    public function edit($id) {
        $news = News::find($id);
        return view('news.create', ['method' => 'PUT', 'submit_btn' => '編輯文章', 'news' => $news]);
    }
    public function update($id, Request $request) {
        News::find($id)->update($request->all());
        return redirect("/news/$id");
    }
    public function delete($id) {
        $news = News::find($id);
        return view('news.create', ['method' => 'DELETE', 'submit_btn' => '刪除文章', 'news' => $news]);
    }
    public function destroy($id) {
        News::find($id)->delete();
        return redirect('/news');
    }
}
