<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['web']],function (){
    Route::auth();
    Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth']],function ($router){
        $router->get('/i18n', 'IndexController@dataTableI18n');
        require __DIR__.'/Routes/Admin/IndexRoute.php';
        require __DIR__.'/Routes/Admin/UserRoute.php';
    });
});