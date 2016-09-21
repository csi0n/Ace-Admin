<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/18/16
 * Time: 13:35
 */
$router->group(['prefix'=>'menu'],function($router){
    $router->get('ajaxIndex','MenuController@ajaxIndex');
    $router->get('sort', 'MenuController@sort');
});
$router->resource('menu','MenuController');