<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Ext\BaseController;
use App\Http\Requests\Admin\UserRequest;
use App\Repositories\IAdmin\IPermissionRepository;
use App\Repositories\IAdmin\IRoleRepository;
use App\Repositories\IAdmin\IUserRepository;
use PermissionRepository;
use UserRepository;
use RoleRepository;

class UserController extends BaseController
{
    protected $iUserRepository;

    protected $iRoleRepository;

    protected $iPermissionRepository;

    /**
     * UserController constructor.
     * @param IUserRepository $iUserRepository
     * @param IRoleRepository $iRoleRepository
     * @param IPermissionRepository $iPermissionRepository
     */
    public function __construct(
        IUserRepository $iUserRepository,
        IRoleRepository $iRoleRepository,
        IPermissionRepository $iPermissionRepository
    )
    {
        $this->_key = 'user';
        parent::__construct();
        $this->iUserRepository = $iUserRepository;
        $this->iRoleRepository = $iRoleRepository;
        $this->iPermissionRepository = $iPermissionRepository;
    }


    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc ajax用户列表
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxIndex()
    {
        $data = $this->iUserRepository->ajaxIndex();
        return response()->json($data);
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.user.list');
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 添加
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $permissions = $this->iPermissionRepository->GetAllPermissionArray();
        $roles = $this->iRoleRepository->GetAllRoleArray();
        return view('admin.user.create', compact('permissions', 'roles'));
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 添加POST
     * @param UserRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserRequest $request)
    {
        $ret = $this->iUserRepository->store($request);
        if ($ret)
            return redirect('admin/user');
        return redirect()->back()->withInput();
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 更新用户
     * @param UserRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UserRequest $request)
    {
        $ret = $this->iUserRepository->update($id, $request);
        if ($ret)
            return redirect('admin/user');
        return redirect()->back()->withInput();
    }


    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 编辑用户
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = $this->iUserRepository->edit($id);
        $roles = $this->iRoleRepository->GetAllRoleArray();
        $permissions = $this->iPermissionRepository->GetAllPermissionArray();
        if ($user)
            return view('admin.user.edit', compact('user', 'roles', 'permissions'));
        return redirect('admin/user');
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 删除用户
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->iUserRepository->destroy($id);
        return redirect('admin/user');
    }

}
