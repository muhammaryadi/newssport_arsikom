<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $count = Article::count();
        return view('content.publikasi.publikasi-list', compact('count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mode = 'add';
        $categories = Category::all();
        return view('content.publikasi.publikasi-add', compact('mode', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required',
                'short_description' => 'required',
                'content' => 'required',
                'category_id' => 'required', 
                'author' => 'required',
                'thumbnail' => 'nullable|sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/article', $filename); 
                $validatedData['thumbnail'] = $filename;
            }
        
            Article::create([
                'title' => $validatedData['title'],
                'short_description' => $validatedData['short_description'],
                'content' => $validatedData['content'],
                'category_id' => $validatedData['category_id'],
                'author' => $validatedData['author'],
                'thumbnail' => isset($validatedData['thumbnail']) ? $validatedData['thumbnail'] : null, 
            ]);
        
            return redirect()->route('article.index')->with('success', 'Article berhasil ditambahkan'); 
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('article.index')->with('error', 'Article gagal ditambahkan'); 
        }

    }

    /**
     * Display the specified resource.
     */
    
    // public show article
    public function show(string $id)
    {
        $Article = Article::find($id);

        if($Article == null){
            return redirect()->route('article.index')->with('error', 'Article tidak ditemukan');
        }

        return view('content.publikasi.article-detail', compact('Article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mode = 'edit';
        $article = Article::find($id);
        $categories = Category::all();
        return view('content.publikasi.publikasi-add', compact('mode', 'article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required',
                'short_description' => 'required',
                'content' => 'required',
                'category_id' => 'required', 
                'author' => 'required',
                'thumbnail' => 'nullable|sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
            ]);
    
            $Article = Article::find($id);
    
            if (!$Article) { // Check for Article existence (not null)
                return redirect()->route('article.index')->with('error', 'Article not found'); // Adjust route name
            }

            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/article', $filename);
                $validatedData['thumbnail'] = $filename;
    
                // Handle old image deletion (optional, based on your needs)
                if ($Article->file) {
                    $oldImagePath = storage_path('app/public/article/' . $Article->file);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
    
            $Article->update([
                'title' => $validatedData['title'] ?? $Article->title,
                'short_description' => $validatedData['short_description'] ?? $Article->short_description,
                'content' => $validatedData['content'] ?? $Article->content,
                'category_id' => $validatedData['category_id'] ?? $Article->category_id,
                'author' => $validatedData['author'] ?? $Article->author,
                'thumbnail' => isset($validatedData['thumbnail']) ? $validatedData['thumbnail'] : null,
            ]);
    
            return redirect()->route('article.index')->with('success', 'Article updated successfully'); // Adjust route name
        } catch (\Exception $e) {
            return redirect()->route('article.index')->with('error', 'Article update failed'); // Adjust route name
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $article = Article::find($id);
    
            if($article == null){
                return redirect()->route('article.index')->with('error', 'article tidak ditemukan');
            }
    
            if ($article->file) {
                $oldImagePath = storage_path('app/public/article/' . $article->file);
                
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $article->delete();
    
            return redirect()->route('article.index')->with('success', 'article berhasil dihapus');
        } catch(\Exception $e){
            return redirect()->route('article.index')->with('error', 'article gagal dihapus');
        }
    }

    public function api_get_article(){
        $article = Article::with('category')->get();
        return response()->json(['data' => $article]);
    }
 
}
