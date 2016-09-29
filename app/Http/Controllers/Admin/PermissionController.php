<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Ext\BaseController;
use App\Http\Requests\Admin\PermissionRequest;
use App\Repositories\IAdmin\IPermissionRepository;

class PermissionController extends BaseController
{
    protected $iPermissionRepository;

    public function __construct(IPermissionRepository $iPermissionRepository)
    {
        $this->_key = 'permission';
        parent::__construct();
        $this->iPermissionRepository = $iPermissionRepository;
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.permission.list');
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 添加
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc Post添加
     * @param PermissionRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PermissionRequest $request)
    {
        $ret = $this->iPermissionRepository->store($request);
        if ($ret)
            return redirect('admin/permission');
        return redirect()->back()->withInput();
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $permission = $this->iPermissionRepository->edit($id);
        if ($permission)
            return view('admin.permission.edit', compact('permission'));
        return redirect('admin/permission');
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc Post编辑
     * @param PermissionRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, PermissionRequest $request)
    {
        $ret = $this->iPermissionRepository->update($id, $request);
        if ($ret)
            return redirect('admin/permission');
        return redirect()->back()->withInput();
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 删除权限
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->iPermissionRepository->destroy($id);
        return redirect('admin/permission');
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc ajax返回权限
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxIndex()
    {
        $data = $this->iPermissionRepository->ajaxIndex();
        return response()->json($data);
    }
}
