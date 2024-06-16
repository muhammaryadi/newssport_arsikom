<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\MasterProduk;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Category::all();
        $groupedArticles = Article::with('category')->get()->groupBy('category.category_name');
        $latestArticles = Article::with('category')->latest()->limit(5)->get();
        return view('public_view.index', compact('kategori', 'groupedArticles', 'latestArticles'));
    }

    public function detail($slug)
    {
        $kategori = Category::all();
        $article = Article::with('category')->where('id', $slug)->firstOrFail();
        return view('public_view.detail', ['article' => $article, 'kategori' => $kategori]);
    }

    public function kategori_news($slug)
    {
        $kategori = Category::all();
        $det_kat = Category::where('id', $slug)->firstOrFail();
        $groupedArticles = Article::with('category')->where('category_id', $slug)->get()->groupBy('category.category_name');
        return view('public_view.kategori', compact('kategori', 'groupedArticles', 'det_kat'));
    }
}
