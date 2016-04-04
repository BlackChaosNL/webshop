<?php
/**
 * Created by PhpStorm.
 * User: Jeroen Vijgen
 * Date: 21-3-2016
 * Time: 21:15
 */

namespace app\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App;

class ProductsController extends Controller
{
    public function run(){
        return view('pages.adm.products');
    }
}