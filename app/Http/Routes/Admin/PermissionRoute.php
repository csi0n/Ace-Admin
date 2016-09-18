<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/18/16
 * Time: 13:35
 */
$router->group(['prefix'=>'permission'],function($router){
    $router->get('ajaxIndex','PermissionController@ajaxIndex');
});
$router->resource('permission','PermissionController');