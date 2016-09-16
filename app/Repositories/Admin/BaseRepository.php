<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/15
 * Time: 19:47
 */

namespace App\Repositories\Admin;


class BaseRepository
{
    protected $app;

    protected $user;
    /**
     * BaseRepository constructor.
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
        $this->user=auth()->user();
    }

}