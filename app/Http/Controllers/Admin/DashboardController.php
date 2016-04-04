<?php
/**
 * Created by PhpStorm.
 * User: jjvij
 * Date: 21-3-2016
 * Time: 23:53
 */

namespace app\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App;

class DashboardController extends Controller
{
    public function run(){
        return View('pages.adm.dashboard');
    }
}