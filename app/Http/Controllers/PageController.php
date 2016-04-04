<?php
/**
 * Created by PhpStorm.
 * User: jjvij
 * Date: 21-3-2016
 * Time: 19:37
 */

namespace app\Http\Controllers;

use App;

class PageController extends Controller
{
    private $template = 'pages.page';

    public function getPage($page = null){
        $p = App\Page::where('route', $page)->where('active', 1)->firstOrFail();
        if(empty($p->html)){ abort(404); }
        return \View::make($this->template, array('content' => $p->html));
    }
}