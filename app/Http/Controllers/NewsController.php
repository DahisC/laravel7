<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller {
    public function index() {
        $newsList = News::get();
        return view('news/index', compact('newsList'));
    }
    public function content($id) {
        $news = News::find($id);
        return view('news/content', ['news' => $news]);
    }
    public function createForm() {
        return view('news/admin');
    }
    public function create(Request $request) {
        // News::create([
        //     'title' => $request->input('title'),
        //     'date' => $request->input('date'),
        //     'img' => $request->input('img'),
        //     'content' => $request->input('content'),
        // ]);
        News::create($request->all());
        return redirect('/news');
    }
    public function updateForm($id) {
        $news = News::find($id);
        return view('news/admin', compact('news'));
    }
    public function update(Request $request) {
        // is destructing object available in php?
        News::find($request->input('id'))->update([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'img' => $request->input('img'),
            'content' => $request->input('content'),
        ]);
        return redirect('/news');
    }
    public function delete($id) {
        News::find($id)->delete();
        return redirect('/news');
    }
}
