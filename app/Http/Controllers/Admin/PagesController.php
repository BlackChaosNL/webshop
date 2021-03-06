<?php
/**
 * Created by PhpStorm.
 * User: Jeroen Vijgen
 * Date: 21-3-2016
 * Time: 20:57
 */

namespace app\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    /**
     * Get Page Generator
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pages(){
        return View('pages.adm.pages');
    }

    /**
     * Make new Page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function makePage(){
        return View('pages.adm.makePage');
    }

    /**
     * Handle page creation
     * @param Request $request
     */
    public function createPage(){
        if(!(empty(Input::get('name')) || empty(Input::get('route')))){
            $page = new App\Page();
            $page->name = Input::get('name');
            if(!(empty(Input::get('parent')) || Input::get('parent') == NULL)){
                $page->parent = Input::get('parent');
            }
            $page->html = '<br />';
            $page->route = Input::get('route');
            $page->active = Input::get('active');
            $page->save();
        }
        return back();
    }

    /**
     * Handle Page Editing
     * @param null $id
     */
    public function editPage($id = null){
        return View('pages.adm.editPage', ['id' => $id]);
    }

    /**
     * Saves changes made to Dynamic Paging
     */
    public function savePage($id = null){
        $page = App\Page::where('id', $id)->firstOrFail();
        $page->html = Input::get('html');
        $page->save();
        return back();
    }

    /**
     * Deletes a page.
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deletePage($id = null){
        $page = App\Page::where('id', $id)->firstOrFail();
        if(!empty($id)){
            $page->delete();
        }
        return redirect('/admin/pages');
    }

    /**
     * Sets visibility for a pageroute
     * @param int $id
     * @param int $visibility
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setVisibility($id = null, $visibility = 1){
        $page = App\Page::where('id', $id)->firstOrFail();
        if($visibility == 0){
            $page->active = 0;    
        }else{
            $page->active = 1;
        }
        $page->save();
        return redirect('/admin/pages');
    }
}