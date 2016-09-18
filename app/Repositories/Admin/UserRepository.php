<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/16
 * Time: 16:11
 */

namespace App\Repositories\Admin;


use App\User;

class UserRepository extends BaseRepository
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
        $user = new User;
        if ($search) {
            $user = $user->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }
        $tempUser = $user;
        $count = $tempUser->count();
        if ($sort) {
            $orderName = request('mDataProp_' . request('iSortCol_0', ''), '');
            $user = $user->orderBy($orderName, $sort);
        }
        $user = $user->offset($start)
            ->limit($length)
            ->get();
        $user->isEmpty() ? $user = [] : $user = $user->toArray();
        foreach ($user as &$v) {
            $v['actionButton'] = '';
        }
        /*返回数据*/
        $returnData = [
            "sEcho" => $draw,
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "aaData" => $user,
        ];
        return $returnData;
    }
}