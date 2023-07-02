<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MajorCategory;
use App\Models\Product;
use App\Models\Review;

class WebController extends Controller
{
    public function index(Product $product, Request $request)
    {
        $categories = Category::all();

        $major_categories = MajorCategory::all();
        $products_score = Product::withCount('reviews')->withAvg('reviews', 'score')->get();
        $recently_products = Product::withCount('reviews')->withAvg('reviews', 'score')->orderBy('created_at', 'desc')->take(4)->get();
        $recommend_products = Product::withCount('reviews')->withAvg('reviews', 'score')->where('recommend_flag', true)->take(3)->get();

        return view('web.index', compact('major_categories', 'categories', 'recently_products', 'recommend_products', 'products_score'));
    }
}
