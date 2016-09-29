<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Ext\BaseController;
use App\Http\Requests\Admin\MenuRequest;
use App\Repositories\IAdmin\IMenuRepository;

class MenuController extends BaseController
{

    protected $menuRepository;

    /**
     * MenuController constructor.
     * @param IMenuRepository $menuRepository
     */
    public function __construct(IMenuRepository $menuRepository)
    {
        $this->_key = 'menu';
        parent::__construct();
        $this->menuRepository = $menuRepository;
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $menus = $this->menuRepository->menus();
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
        $data = $this->menuRepository->ajaxIndex();
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
        $this->menuRepository->store($request);
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
        $menu = $this->menuRepository->edit($id);
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
        $this->menuRepository->update($id, $request);
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
        $result = $this->menuRepository->sort();
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
        $this->menuRepository->destroy($id);
        return redirect('admin/menu');
    }
}
