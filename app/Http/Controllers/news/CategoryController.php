<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $count = Category::count();
        return view('content.kategori.kategori-list', compact('categories', 'count'));
    }

    public function create()
    {
        $mode='add';
        return view('content.kategori.kategori-add', compact('mode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        $category = Category::create([
            'category_name' => $request->nama_kategori,
        ]);
        return redirect()->route('kategori.index');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function edit($id)
    {
        $mode='edit';
        $categorie = Category::findOrFail($id);
        return view('content.kategori.kategori-add', compact('mode', 'categorie'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        $category->update(
            [
                'category_name' => $request->nama_kategori,
            ]
        );
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('kategori.index');
    }


    public function api_get_kategori(){
        $produk = Category::all();
        return response()->json(['data' => $produk]);
    }
}