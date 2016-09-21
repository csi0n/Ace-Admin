<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MenuRequest;
use MenuRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        $menus = MenuRepository::menus();
        return view('admin.menu.list', compact('menus'));
    }

    public function ajaxIndex()
    {
        $data = MenuRepository::ajaxIndex();
        return response()->json($data);
    }

    public function store(MenuRequest $request)
    {
        MenuRepository::store($request);
        return redirect('admin/menu');
    }

    public function edit($id)
    {
        $menu = MenuRepository::edit($id);
        return response()->json($menu);
    }

    public function sort()
    {
        $result = MenuRepository::sort();
        return response()->json($result);
    }

    public function destroy($id)
    {
        MenuRepository::destroy($id);
        return redirect('admin/menu');
    }
}
