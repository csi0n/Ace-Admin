<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/16
 * Time: 16:10
 */

namespace App\Repositories\Admin;


use App\Models\Role;
use Flash;

class RoleRepository extends BaseRepository
{
    public function ajaxIndex()
    {
        /*获取数据*/
        $draw = request('sEcho', 1);//请求次数
        /*每页条数*/
        $length = request('iDisplayLength', 10);
        /*起始记录数*/
        $start = request('iDisplayStart', 0);
        /*搜索内容*/
        $search = request('sSearch', '');
        $sort = request('sSortDir_0', '');
        $role = new Role;
        if ($search) {
            $role = $role->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }
        if ($sort) {
            $orderName = request('mDataProp_' . request('iSortCol_0', ''), '');
            $role = $role->orderBy($orderName, $sort);
        }
        $tempRole = $role;
        $count = $tempRole->count();
        $role = $role->offset($start)
            ->limit($length)
            ->get();
        foreach ($role as $v) {
            $v['actionButton'] = $v->GetActionButton();;
        }
        $role->isEmpty() ? $role = [] : $role = $role->toArray();
        /*返回数据*/
        $returnData = [
            "sEcho" => $draw,
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "aaData" => $role,
        ];
        return $returnData;
    }

    public function store($request)
    {
        $role = new Role;
        if ($role->fill($request->all())->save()) {
            if ($request->permission)
                $role->permissions()->sync($request->permission);
            Flash::success(trans('alerts.role.addSuccess'));
            return true;
        }
        Flash::error(trans('alerts.role.addFailed'));
        return false;
    }

    public function edit($id)
    {
        $role = $this->verifyRole($id);
        $role = $role->toArray();
        $role['permissions'] = array_column($role['permissions'], 'id');
        return $role;
    }

    public function update($request, $id)
    {
        $role = $this->verifyRole($id);
        if (empty($role))
            return false;
        if ($role->fill($request->all())->save()) {
            if ($request->permission)
                $role->permissions()->sync($request->permission);
            Flash::success(trans('alerts.role.updateSuccess'));
            return true;
        }
        Flash::error(trans('alerts.role.updateFailed'));
        return false;
    }

    public function destroy($id)
    {
        $role = $this->verifyRole($id);
        if (empty($role))
            return false;
        return $role->delete();
    }

    private function verifyRole($id)
    {
        $role = Role::with('permissions')->find($id);
        if (!empty($role)) {
            return $role;
        }
        Flash::error(trans('alerts.role.notFind'));
        return false;
    }

    public function GetAllRoleArray()
    {
        $role = Role::all();
        return $role->isEmpty() ? [] : $role->toArray();
    }
}