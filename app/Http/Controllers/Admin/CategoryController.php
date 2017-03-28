<?php
/**
 * Created by PhpStorm.
 * User: jjvij
 * Date: 31-3-2016
 * Time: 22:14
 */

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function run(){
        return view('pages.adm.categories', ['categories' => App\Category::paginate(15)]);
    }

    public function makeCategory(){
        return view('pages.adm.makecategory', ['categories' => App\Category::all()]);
    }

    public function alterTemp($id = null){
        return view('pages.adm.altercategory', 
            ['category' => App\Category::where('id', $id)->firstOrFail()]
        );
    }

    public function alterCategory(Request $r, $id = null){
        $category = App\Category::where('id', $id)->firstOrFail();
        $category->cat_name = $r->cat_name;
        $category->cat_parent = $r->parent;
        $category->save();
        return back();
    }

    public function addCategory(Request $r){
        $category = new App\Category;
        $category->cat_name = $r->cat_name;
        $category->cat_parent = $r->parent;
        $category->save();
        \Session::flash('feedback', 'Category ' . $r->cat_name . ' has been added');
        return back();
    }

    public function removeCategory($id = null){
        $category = App\Category::where('id', $id)->firstOrFail();
        $items = App\Product::where('category', $id);
        $category->delete();
        $items->delete();
        return back();
    }
}