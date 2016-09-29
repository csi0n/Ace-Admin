<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/15
 * Time: 19:47
 */

namespace App\Repositories\Admin\Ext;

class BaseRepository
{

    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

}