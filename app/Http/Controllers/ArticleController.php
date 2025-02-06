<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('theme')->get();

        return view('admin.pages.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.pages.articles.create');
    }

    public function store(Request $request)
    {
        $article = new Article();
        $article->theme_id = $request->theme_id;
        $article->slug = \Str::slug($request->title);
        $article->fill($request->all());
        $article->save();
        return redirect()->route('admin.pages.articles.index')->with('success', __('Article created successfully'));
    }

    public function edit(Article $article)
    {
        return view('admin.pages.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $article->slug = \Str::slug($request->title);
        $article->fill($request->all());
        $article->save();
        return redirect()->route('admin.pages.articles.index')->with('success', __('Article updated successfully'));
    }

    public function fileUpload(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'file' => 'image|max:2048'
        ]);

        if ($validation->fails()) return response()->make($validation->errors()->first(), 400);

        $file = $request->file('file');
        $name =  time() . '-' . $file->getClientOriginalName();
        $file->storeAs('/app/public/articles/', $name);
        return response()->json([
            'name' => $name,
        ]);
    }

    public function destroy(Article $article)
    {
        $user = \Auth::user();
        if($user->can('delete-category'))
        {
            $article->delete();

            return redirect()->route('admin.pages.articles.index')->with('success', __('Article deleted successfully'));
        }
        else
        {
            return view('403');
        }
    }

    public function file_upload(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'file' => 'image|max:2048'
        ]);

        if ($validation->fails()) return response()->make($validation->errors()->first(), 400);

        $file = $request->file('file');
        $name =  time() . '-' . $file->getClientOriginalName();
        $file->storeAs('/app/public/articles/', $name);
        return response()->json([
            'name' => $name,
        ]);
    }
}