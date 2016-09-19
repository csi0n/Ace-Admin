<?php

namespace App\Http\Controllers\Admin;

use MenuRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        $menus=MenuRepository::menus();
        return view('admin.menu.list',compact('menus'));
    }

    public function ajaxIndex()
    {
        $data = MenuRepository::ajaxIndex();
        return response()->json($data);
    }
}
