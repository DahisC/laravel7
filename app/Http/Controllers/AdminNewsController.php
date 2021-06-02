<?php

namespace App\Http\Controllers;

use App\News;
use App\helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index()
    {
        $newsList = News::get();
        return view('admin.news.index', compact('newsList'));
    }
    public function create()
    {
        $action = 'Create';
        return view('admin.news.factory', compact('action'));
    }
    public function store(Request $request)
    {
        if ($request->hasFile('summernote_previewImages')) {
            $newsId = News::create($request->all())->id;
            helpers::uploadFile($request->file('summernote_previewImages'), "/news/$newsId");
        } else {
            News::create($request->all());
        }
        return redirect()->route('admin.news.index');
    }
    public function edit(News $news)
    {
        $action = 'Edit';
        return view('admin.news.factory', compact('action', 'news'));
    }
    public function update(Request $request, News $news)
    {
        $updateResult = $news->update($request->all());
        // if ($updateResult) return redirect()->route('admin.news.index');
    }
    public function destroy(News $news)
    {
        Storage::deleteDirectory("public/news/$news->id");
        $deleteResult = $news->delete();
        if ($deleteResult) return redirect()->route('admin.news.index');
    }
    public function storeImage($file)
    {
        // Storage::put('/public/news/test.jpg', file_get_contents($file));
        $path = Storage::putFile('/public/news', $file);
        return Storage::url($path);
    }
}
