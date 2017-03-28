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

    }

    public function editProduct($id = null){
        return View('pages.adm.editProduct', [
            'product' => App\Product::where('id', $id)->first()
        ]);
    }

    public function deleteProduct($id = null){
        if($id != null){
            App\Product::where('id', $id)->first()->delete();
        }
        return back();
    }
}