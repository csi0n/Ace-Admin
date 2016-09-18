<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/16
 * Time: 16:10
 */

namespace App\Repositories\Admin;


use App\Models\Permission;

class PermissionRepository extends BaseRepository
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
        $permission = new Permission;
        if ($search) {
            $permission = $permission->where('name', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }
        $tempPermission=$permission;
        $count=$tempPermission->count();
        if ($sort) {
            $orderName = request('mDataProp_' . request('iSortCol_0', ''), '');
            $permission = $permission->orderBy($orderName, $sort);
        }
        $permission = $permission->offset($start)
            ->limit($length)
            ->get();
        $permission->isEmpty() ? $permission = [] : $permission = $permission->toArray();
        foreach ($permission as &$v) {
            $v['actionButton'] = '';
        }
        /*返回数据*/
        $returnData = [
            "sEcho" => $draw,
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "aaData" => $permission,
        ];
        return $returnData;
    }

}