<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/16
 * Time: 16:10
 */

namespace App\Repositories\Admin;


use App\Models\Role;

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
        $tempRole=$role;
        $count=$tempRole->count();
        $role = $role->offset($start)
            ->limit($length)
            ->get();
        $role->isEmpty() ? $role = [] : $role = $role->toArray();
        foreach ($role as &$v) {
            $v['actionButton'] = '';
        }
        /*返回数据*/
        $returnData = [
            "sEcho" => $draw,
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "aaData" => $role,
        ];
        return $returnData;
    }
}