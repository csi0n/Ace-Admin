<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Ext\BaseController;
use App\Http\Requests\Admin\RoleRequest;
use App\Repositories\IAdmin\IPermissionRepository;
use App\Repositories\IAdmin\IRoleRepository;
use PermissionRepository;
use RoleRepository;

class RoleController extends BaseController
{
    protected $iRoleRepository;

    protected $iPermissionRepository;

    /**
     * RoleController constructor.
     * @param IRoleRepository $iRoleRepository
     * @param IPermissionRepository $iPermissionRepository
     */
    public function __construct(IRoleRepository $iRoleRepository, IPermissionRepository $iPermissionRepository)
    {
        $this->_key = 'role';
        parent::__construct();
        $this->iRoleRepository = $iRoleRepository;
        $this->iPermissionRepository = $iPermissionRepository;
    }


    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc
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
        $data = $this->iRoleRepository->ajaxIndex();
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
        $permissions = $this->iPermissionRepository->GetAllPermissionArray();
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
        $ret = $this->iRoleRepository->store($request);
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
        $role = $this->iRoleRepository->edit($id);
        $permissions = $this->iPermissionRepository->GetAllPermissionArray();
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
    public function update($id,RoleRequest $request)
    {
        $this->iRoleRepository->update($id, $request);
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
        $this->iRoleRepository->destroy($id);
        return redirect('admin/role');
    }
}
