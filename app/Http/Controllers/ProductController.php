<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\MajorCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->category !== null) {
            // $reviews = Product::withCount('reviews')->withAvg('reviews', 'score')->get();
            $products = Product::where('category_id', $request->category)->withCount('reviews')->withAvg('reviews', 'score')->sortable()->paginate(15);
            $total_count = Product::where('category_id', $request->category)->count();
            $category = Category::find($request->category);
            $major_category = MajorCategory::find($category->major_category_id);
        } else {
            // $reviews = Product::withCount('reviews')->withAvg('reviews', 'score')->get();
            $products = Product::withCount('reviews')->withAvg('reviews', 'score')->sortable()->paginate(15);
            $total_count = "";
            $category = null;
            $major_category = null;
        }
        $categories = Category::all();
        $major_categories = MajorCategory::all();

        // dd($products);
        return view('products.index', compact('products', 'category', 'major_category', 'categories', 'major_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->save();

        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $reviews = $product->reviews()->get();
        $review_scores = Product::withCount('reviews')->withAvg('reviews', 'score')->get();
        // $score_avg = Product::withAvg('reviews', 'score')->first();
        // $products_score = Review::selectRaw('product_id, COUNT(product_id) as score_total')->groupBy('product_id')->where('product_id','=',$product->id)->first();
        // $score_avg = Review::selectRaw('product_id, ROUND(AVG(score),1) as score_avg')->groupBy('product_id')->where('product_id','=',$product->id)->first();
        return view('products.show', compact('product', 'reviews','review_scores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->update();

        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('products.index');
    }

    public function favorite(Product $product)
    {
        Auth::user()->togglefavorite($product);
 
        return back();
    }
}
