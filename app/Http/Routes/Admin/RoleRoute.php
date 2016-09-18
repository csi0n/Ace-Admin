<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/18/16
 * Time: 13:05
 */
$router->group(['prefix'=>'role'],function($router){
    $router->get('ajaxIndex','RoleController@ajaxIndex');
});
$router->resource('role','RoleController');