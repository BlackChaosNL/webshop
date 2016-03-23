<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Route::get('', '');
// Get main page.
$menuItems = DB::table('Menu')->get();
foreach($menuItems as $item){
    Route::get($item->link, );
}




Route::get('/', 'MainController@run');
// Fetch login page.
Route::get('login', 'LoginController@run');
// Handle login request.
Route::post('login', 'LoginController@login');
// Get Blog page.
Route::get('blog', 'BlogController@run');
// Get product overview.
Route::get('product', 'ProductController@run');
//Only allow numbers.
Route::pattern('productid', '[0-9]+');
// Fetch specific product.
Route::get('product/{productid}', function($productid){

});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
