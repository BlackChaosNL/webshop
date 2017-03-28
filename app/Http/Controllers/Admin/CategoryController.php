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
use Illuminate\Support\Facades\Input;
use App;

class CategoryController extends Controller
{
    public function run(){
        $categories = DB::table('categories')->paginate(15);
        return view('pages.adm.categories', ['categories' => $categories]);
    }

    public function makeCategory(){
        return view('pages.adm.makecategory');
    }

    public function alterTemp($id = null){
        $category = App\Category::where('id', $id)->firstOrFail();
        return view('pages.adm.altercategory', ['category' => $category]);
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
        $category->cat_name = $r->name;
        $category->cat_parent = $r->parent;
        $category->save();
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