<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/16
 * Time: 16:09
 */

namespace app\Facades;


use Illuminate\Support\Facades\Facade;

class PermissionFacade extends Facade
{

    public static function getFacadeAccessor()
    {
        return 'PermissionRepository';
    }
}