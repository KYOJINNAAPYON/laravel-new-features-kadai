<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory, Favoriteable, Sortable;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image',
        'recommend_flag',
        'carriage_flag',
    ];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function reviews() {
        return $this->hasMany('App\Models\Review');
    }

    public function scoreSortable($query, $direction) {
        // dd($direction);

        // return $query->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
        //                     ->orderBy('score', $direction)
        //                     ->select('products.*');

        return $query->withAvg('reviews', 'score')->withCount('reviews')->orderBy('reviews_avg_score', $direction);

    }
    public function idSortable($query, $direction) {

        return $query->withAvg('reviews', 'score')->withCount('reviews')->orderBy('id', $direction);

    }
    public function priceSortable($query, $direction) {

        return $query->withAvg('reviews', 'score')->withCount('reviews')->orderBy('price', $direction);

    }
}