<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function indexArticleAdmin()
    {

        $articles = Article::with(['categoryArticle'])->paginate(9); // Eager load kategori dan brand

        return view('admin.article.index', [
            'articles' => $articles,
        ]);
    }

    public function createArticle()
    {
        $categories = CategoryArticle::all();

        return view('admin.article.create', [
            'categories' => $categories,
        ]);
    }

    public function reviewArticle($id)
    {
        $article = Article::find($id);
        $categoryArticle = CategoryArticle::all();

        return view('admin.article.review', [
            'article' => $article,
            'categoryArticle' => $categoryArticle,
        ]);
    }

    public function storeArticle(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_article_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/article_images'), $imageName);
            $imagePath = 'uploads/article_images/' . $imageName;
        }

        Article::create([
            'title' => $request->title,
            'category_article_id' => $request->category_article_id,
            'image' => $imagePath,
            'content' => $request->content,
        ]);

        return redirect()->route('index-article')->with('success', 'Article created successfully!');
    }


    public function editArticle()
    {
        return view('admin.article.edit');
    }

    public function updateArticle() {}

    public function deleteArticle() {}


    // USER
    public function articleUser(){
        $articles = Article::all();
        $categoryArticles = CategoryArticle::with(['categoryArticles'])
        ->get();

        // dd(count($categoryArticles));

        return view('user.component.newsletter', [
            'articles' => $articles,
            'categoryArticles' => $categoryArticles,
        ]);
    }

    public function detailArticle($name){
        $article = Article::where('name', $name)->first();

        return view('user.component.blog', [
            'artcile' => $article,
        ]);
    }
}
