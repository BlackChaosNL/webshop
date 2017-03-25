<?php
/**
 * Created by PhpStorm.
 * User: jjvij
 * Date: 31-3-2016
 * Time: 21:29
 */

namespace app\Http\Controllers\User;

use Illuminate\Routing\Controller;
use App;
use Auth;

class OrderController extends Controller
{
    public function run(){
        return view('pages.user.orders', 
            ['orders' => App\Order::where('customer_id', Auth::user()->id)->paginate(15)]
        );
    }
}