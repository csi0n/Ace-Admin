<?php

namespace App\Http\Controllers\Admin\Ext;

use App\Traits\CheckPermissions;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    use CheckPermissions;
    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->init();
    }
}
