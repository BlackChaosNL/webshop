<?php

namespace App\Http\Controllers;

use App;

class ProductController extends Controller
{
    public function run(){
        return view('pages.product');
    }

    public function getCategory($cat = null){
        return view('pages.products', 
            ['category' => App\Category::where('id', $cat)->firstOrFail(), 
            'products' => App\Product::where('category', App\Category::where('id', $cat)->firstOrFail()->id)->paginate(15)]
        );
    }

    public function getProduct($id = null){
        return view('pages.product', ['product' => App\Product::where('id', $id)->firstOrFail()]);
    }
}
