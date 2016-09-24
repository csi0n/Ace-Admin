<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/16
 * Time: 16:11
 */

namespace App\Repositories\Admin;


use App\User;
use Flash;

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

        foreach ($user as $v) {
            $v['actionButton'] = $v->GetActionButton();
        }
        $user->isEmpty() ? $user = [] : $user = $user->toArray();
        /*返回数据*/
        $returnData = [
            "sEcho" => $draw,
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "aaData" => $user,
        ];
        return $returnData;
    }

    public function store($request)
    {
        $user = new User;
        $userData = $request->all();
        $userData['password'] = $request->get('password', '123456');
        if ($user->fill($userData)->save()) {
            if (isset($userData['permission']))
                $user->permission()->sync($userData['permission']);
            if (isset($userData['roles']) && $userData['roles'])
                $user->role()->sync($userData['roles']);
            Flash::success(trans('alerts.user.addSuccess'));
            return true;
        }
        Flash::error(trans('alerts.user.addFailed'));
        return false;
    }

    public function edit($id)
    {
        $user = $this->verifyUser($id);
        if (empty($user))
            return false;
        $user = $user->toArray();
        $user['permission'] = array_column($user['permission'], 'id');
        $user['role'] = array_column($user['role'], 'id');
        return $user;
    }

    public function destroy($id)
    {
        $user = $this->verifyUser($id);
        if (empty($user))
            return false;
        return $user->delete();
    }

    private function verifyUser($id)
    {
        $user = User::with(['permission', 'role'])->find($id);
        if ($user)
            return $user;
        Flash::error(trans('alerts.user.notFind'));
        return false;
    }
}