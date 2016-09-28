<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RoleRequest;
use App\Traits\CheckPermissions;
use PermissionRepository;
use RoleRepository;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    use CheckPermissions;

    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->_key='role';
        $this->init();
    }


    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc Index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.role.list');
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc ajax角色列表
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxIndex()
    {
        $data = RoleRepository::ajaxIndex();
        return response()->json($data);
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 创建角色
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $permissions = PermissionRepository::GetAllPermissionArray();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc POST创建权限
     * @param RoleRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RoleRequest $request)
    {
        $ret = RoleRepository::store($request);
        if ($ret)
            return redirect('admin/role');
        else
            return redirect()->back()->withInput();
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 编辑权限
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = RoleRepository::edit($id);
        $permissions = PermissionRepository::GetAllPermissionArray();
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 提交更新权限
     * @param RoleRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(RoleRequest $request, $id)
    {
        RoleRepository::update($request, $id);
        return redirect('admin/role');
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 删除
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        RoleRepository::destroy($id);
        return redirect('admin/role');
    }
}
