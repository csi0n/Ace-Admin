<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RoleRequest;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PermissionRepository;
use UserRepository;
use RoleRepository;

class UserController extends Controller
{
    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc ajax用户列表
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxIndex()
    {
        $data = UserRepository::ajaxIndex();
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
        $permissions = PermissionRepository::GetAllPermissionArray();
        $roles = RoleRepository::GetAllRoleArray();
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
        $ret = UserRepository::store($request);
        if ($ret)
            return redirect('admin/user');
        return redirect()->back()->withInput();
    }

    public function update(UserRequest $request)
    {
        $ret = UserRepository::update($request);
        if ($ret)
            return redirect('admin/user');
        return redirect()->back()->withInput();
    }


    public function edit($id)
    {
        $user = UserRepository::edit($id);
        $roles = RoleRepository::GetAllRoleArray();
        $permissions = PermissionRepository::GetAllPermissionArray();
        if ($user)
            return view('admin.user.edit', compact('user', 'roles', 'permissions'));
        return redirect('admin/user');
    }

    public function destroy($id)
    {
        UserRepository::destroy($id);
        return redirect('admin/user');
    }

}
