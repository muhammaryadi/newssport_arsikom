<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;


class Analytics extends Controller
{
  public function index()
  {
    $statistik = [
      'total_berita' => Article::count(),
      'total_kategori' => Category::count(),
    ];


    return view('content.apps.app-ecommerce-dashboard', compact('statistik'));
  }
}
