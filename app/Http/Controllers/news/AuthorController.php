<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    public function create()
    {
        // Code to show the form for creating a new author
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'bio' => 'nullable|string',
            'email' => 'required|string|email|unique:authors,email',
        ]);

        $author = Author::create($request->all());
        return response()->json($author, 201);
    }

    public function show($id)
    {
        $author = Author::findOrFail($id);
        return response()->json($author);
    }

    public function edit($id)
    {
        // Code to show the form for editing the specified author
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'bio' => 'nullable|string',
            'email' => 'required|string|email|unique:authors,email,' . $id,
        ]);

        $author->update($request->all());
        return response()->json($author);
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return response()->json(null, 204);
    }
}