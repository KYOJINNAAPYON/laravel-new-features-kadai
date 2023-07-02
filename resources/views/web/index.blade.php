@extends('layouts.app')
 
 @section('content')
 <div class="row">
     <div class="col-2">
         @component('components.sidebar', ['categories' => $categories, 'major_categories' => $major_categories])
         @endcomponent
     </div>
     <div class="col-9">
         <h1>おすすめ商品</h1>
         <div class="row">
             @foreach ($recommend_products as $recommend_product)
             <div class="col-4">
                <a href="{{ route('products.show', $recommend_product) }}">
                    @if ($recommend_product->image !== "")
                    <img src="{{ asset($recommend_product->image) }}" class="img-thumbnail">
                    @else
                    <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                    @endif
                </a>
                <div class="row">
                    <div class="col-12 mb-4 mt-2">
                            {{ $recommend_product->name }}
                            @if (is_null($recommend_product->reviews_avg_score))
                            <div class="rate_null">
                            <label class="base">★★★★★</label>
                            <label>￥{{ $recommend_product->price }}</label>
                            </div>
                            @else
                            <div class="rate_star">
                            <label data-width="{{ round($recommend_product->reviews_avg_score,1) }}">★★★★★</label>
                            <label class="base">★★★★★</label>{{ $recommend_product->reviews_count }}
                            </div>
                            <label>￥{{ $recommend_product->price }}</label>
                            @endif
                    </div>
                </div>
             </div>
             @endforeach
         </div>
 
         <h1>新着商品</h1>
         <div class="row">
             @foreach ($recently_products as $recently_product)
             <div class="col-3">
                <a href="{{ route('products.show', $recently_product) }}">
                    @if ($recently_product->image !== "")
                    <img src="{{ asset($recently_product->image) }}" class="img-thumbnail">
                    @else
                    <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                    @endif
                </a>
                <div class="row">
                    <div class="col-12">
                        <div class="col-12 mb-4 mt-2">
                            {{ $recently_product->name }}
                            @if (is_null($recently_product->reviews_avg_score))
                            <div class="rate_null">
                            <label class="base">★★★★★ 0</label>
                            <label>￥{{ $recently_product->price }}</label>
                            </div>
                            @else
                            <div class="rate_star">
                            <label data-width="{{ round($recently_product->reviews_avg_score,1) }}">★★★★★</label>
                            <label class="base">★★★★★</label>{{ $recently_product->reviews_count }}
                            </div>
                            <label>￥{{ $recently_product->price }}</label>
                            @endif
                        </div>
                    </div>
                </div>
             </div>
             @endforeach
         </div>
     </div>
 </div>
 @endsection