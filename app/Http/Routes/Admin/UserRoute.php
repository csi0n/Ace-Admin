<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/15
 * Time: 18:14
 */
$router->group(['prefix'=>'user'],function($router){
    $router->get('ajaxIndex','UserController@ajaxIndex');
});
$router->resource('user','UserController');