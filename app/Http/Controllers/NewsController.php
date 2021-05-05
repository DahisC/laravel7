<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller {
    public function index() {
        $newsList = DB::table('news')->get();
        return view('news/index', compact('newsList'));
    }
    public function content($id) {
        $news = DB::table('news')->where('id', $id)->first();
        return view('news/content', ['news' => $news]);
    }
    public function createForm() {
        return view('news/admin');
    }
    public function create(Request $request) {
        DB::table('news')->insert([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'img' => $request->input('img'),
            'content' => $request->input('content'),
            'views' => $request->input('views'),
        ]);
        return redirect('/news');
    }
    public function updateForm($id) {
        $news = DB::table('news')->where('id', $id)->first();
        return view('news/admin', compact('news'));
    }
    public function update(Request $request) {
        DB::table('news')->where('id', $request->input('id'))->update([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'img' => $request->input('img'),
            'content' => $request->input('content'),
            'views' => $request->input('views'),
        ]);
        return redirect('/news');
    }
    public function delete($id) {
        DB::table('news')->where('id', $id)->delete();
        return redirect('/news');
    }
}
