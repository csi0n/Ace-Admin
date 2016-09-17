<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
class IndexController extends Controller
{

    public function index(){
        return view('admin.index.index');
    }

    public function dataTableI18n()
    {
        return response()->json(trans('pagination.i18n'));
    }
}
