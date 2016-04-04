<?php

namespace App\Http\Controllers;

use App;

class ProductController extends Controller
{
    public function run(){
        return view('pages.product');
    }

    public function getCategory($cat = null){
        $getCatId = App\Category::where('id', $cat)->firstOrFail();
        $getProducts = App\Product::where('category', $getCatId->id)->paginate(15);
        return view('pages.products', ['category' => $getCatId, 'products' => $getProducts]);
    }

    public function getProduct($id = null){
        $getProduct = App\Product::where('id', $id)->firstOrFail();
        return view('pages.product', ['product' => $getProduct]);
    }
}
