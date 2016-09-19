<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PermissionRequest;
use PermissionRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
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
        $ret = PermissionRepository::store($request);
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
        $permission = PermissionRepository::edit($id);
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
    public function update(PermissionRequest $request, $id)
    {
        $ret = PermissionRepository::update($request, $id);
        if ($ret)
            return redirect('admin/permission');
        return redirect()->back()->withInput();
    }

    public function destroy($id)
    {
        PermissionRepository::destroy($id);
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
        $data = PermissionRepository::ajaxIndex();
        return response()->json($data);
    }
}
