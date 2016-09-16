<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/15
 * Time: 19:40
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class MenusFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MenusRepository';
    }
}