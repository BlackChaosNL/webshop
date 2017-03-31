<?php
/**
 * Created by PhpStorm.
 * User: Jeroen Vijgen
 * Date: 21-3-2016
 * Time: 21:15
 */

namespace app\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function run(){
        return view('pages.adm.products', [
            'products' => App\Product::paginate(15)
        ]);
    }

    public function addProduct(){
        return View('pages.adm.addProduct', [
            'categories' => App\Category::all()
        ]);
    }

    public function saveProduct(Request $r){
        $p = new App\Product;
        $p->name = $r->product_name;
        $p->piece = $r->amount;
        $p->category = $r->category;
        $p->small_desc = $r->sdescription;
        $p->large_desc = $r->ldescription;
        if($r->file('picture')->isValid()){
            $img = $r->file('picture');
            $fileName = rand(11111, 99999) . '_' . $img->getClientOriginalName();
            $img->move('img/products/', $fileName);
            $p->picture = $fileName;
        }else{
            $p->picture = 'NIA.png';
        }
        $p->price = $r->price;
        $p->save();
        \Session::flash('product', 'The product has been created');
        return back();
    }

    public function editProduct($id = null){
        return View('pages.adm.editProduct', [
            'product' => App\Product::where('id', $id)->first(),
            'categories' => App\Category::all()
        ]);
    }

    public function updateProduct(Request $r){
        $p = App\Product::where('id', $r->id)->first();
        $p->name = $r->product_name;
        $p->piece = $r->amount;
        $p->category = $r->category;
        $p->small_desc = $r->sdescription;
        $p->large_desc = $r->ldescription;
        if($r->hasFile('picture') && $r->file('picture')->isValid()){
            $img = $r->file('picture');
            $fileName = rand(11111, 99999) . '_' . $img->getClientOriginalName();
            $img->move('img/products/', $fileName);
            $p->picture = $fileName;
        }
        $p->price = $r->price;
        $p->save();
        \Session::flash('product', 'The product has been updated!');
        return back();
    }

    public function deleteProduct($id = null){
        if($id != null){
            $product = App\Product::where('id', $id)->first();
            $product->piece = 0;
            $product->save();
        }
        return back();
    }
}