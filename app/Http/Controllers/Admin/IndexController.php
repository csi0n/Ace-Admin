<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Ext\BaseController;

class IndexController extends BaseController
{

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.index.index');
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc dataTable国际化语言
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTableI18n()
    {
        return response()->json(trans('pagination.i18n'));
    }
}
