<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/16
 * Time: 16:08
 */

namespace app\Facades;


use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'UserRepository';
    }
}