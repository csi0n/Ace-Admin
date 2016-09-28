<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MenuRequest;
use App\Traits\CheckPermissions;
use MenuRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    use CheckPermissions;

    /**
     * MenuController constructor.
     */
    public function __construct()
    {
        $this->_key = 'menu';
        $this->init();
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $menus = MenuRepository::menus();
        return view('admin.menu.list', compact('menus'));
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc首页ajax
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxIndex()
    {
        $data = MenuRepository::ajaxIndex();
        return response()->json($data);
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 创建菜单
     * @param MenuRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(MenuRequest $request)
    {
        MenuRepository::store($request);
        return redirect('admin/menu');
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 编辑菜单
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $menu = MenuRepository::edit($id);
        return response()->json($menu);
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 提交编辑菜单
     * @param $id
     * @param MenuRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, MenuRequest $request)
    {
        MenuRepository::update($id, $request);
        return redirect('admin/menu');
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 菜单排序
     * @return \Illuminate\Http\JsonResponse
     */
    public function sort()
    {
        $result = MenuRepository::sort();
        return response()->json($result);
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 删除菜单
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        MenuRepository::destroy($id);
        return redirect('admin/menu');
    }
}
