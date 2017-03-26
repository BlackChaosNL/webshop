<?php
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

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    // Get main page.
    Route::get('/', 'MainController@run');
    // Get user generated users
    Route::get('/p/{page}', [
            'uses' => 'PageController@getPage'
    ])->where('page', '([A-Za-z0-9\-\/]+)');
    // Get
    Route::get('/{category}',[
        'uses' => 'ProductController@getCategory'
    ])->where('category', '([0-9]+)');
    // Get Singular Product
    Route::get('/product/{id}', [
        'uses' => 'ProductController@getProduct'
    ])->where('id', '([0-9]+)');
    // Cart, to put stuff in.
    Route::get('/cart', 'CartController@getCart');
    Route::group(['prefix' => 'cart'], function(){
        Route::get('/add/{id}', [
            'uses' => 'CartController@addToCart'
        ])->where('id', '([1-9]+)');
        Route::get('/remove/{id}', [
            'uses' => 'CartController@removeFromCart'
        ])->where('id', '([1-9]+)');
        Route::get('/clear', 'CartController@clearCart');
        Route::get('/purchase', 'CartController@checkOutCart');
    });

    Route::group(['middleware' => ['auth'], 'namespace' => 'User', 'prefix' => 'user'], function(){
        Route::get('dashboard', 'UserController@run');
        Route::get('profile', 'UserController@showProfile');
        Route::post('profile', 'UserController@alterProfile');
        Route::get('orders', 'OrderController@run');
        Route::get('orders/{id}', 'OrderController@showDetails')->where('id', '([1-9+])');
    });
    // Admin Group
    Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
        Route::get('dashboard', 'DashboardController@run');
        Route::get('pages', 'PagesController@pages');
        Route::group(['prefix' => 'pages'], function(){
            Route::get('create', 'PagesController@makePage');
            Route::post('create', 'PagesController@createPage');
            Route::get('edit/{id}', ['uses' => 'PagesController@editPage'])->where('id', '([0-9]+)');
            Route::post('edit/{id}', ['uses' => 'PagesController@savePage'])->where('id', '([0-9]+)');
            Route::get('delete/{id}', ['uses' => 'PagesController@deletePage'])->where('id', '([0-9]+)');
            Route::get('visibility/{id}/{visibility}', ['uses' => 'PagesController@setVisibility'])->where('id', '([0-9]+)')->where('visibility', '([0-1])');
        });
        Route::get('users', 'UsersController@run');
        Route::group(['prefix' => 'users'], function(){
            Route::get('/alter/{id}', ['uses' => 'UsersController@alterUser'])->where('id', '([0-9]+)');
            Route::post('/alter/{id}', ['uses' => 'UsersController@saveUser'])->where('id', '([0-9]+)');
            Route::post('/delete/{id}', [
                'uses' => 'UsersController@removeUser'
            ])->where('id', '([0-9]+)');
        });
        Route::get('products', 'ProductsController@run');
        Route::group(['prefix' => 'products'], function(){
            Route::get('/add', 'ProductsController@addProduct');
            Route::post('/add', 'ProductsController@saveProduct');
            Route::get('/remove/{id}', 'ProductsController@deleteProduct');
        });
        Route::get('categories', 'CategoryController@run');
        Route::group(['prefix' => 'categories'], function(){
            Route::get('/add', 'CategoryController@makeCategory');
            Route::post('/add', 'CategoryController@addCategory');
            Route::get('/alter/{id}', ['uses' => 'CategoryController@alterTemp'])->where('id', '([0-9]+)');
            Route::post('/alter/{id}', ['uses' => 'CategoryController@alterCategory'])->where('id', '([0-9]+)');
            Route::post('/remove/{id}', ['uses' => 'CategoryController@removeCategory'])->where('id', '([0-9]+)');
        });
    });
});
