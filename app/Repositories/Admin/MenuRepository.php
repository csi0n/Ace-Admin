<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/15
 * Time: 19:42
 */

namespace App\Repositories\Admin;

use App\Models\Menu;
use Cache;

class MenuRepository extends BaseRepository
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
        $menu = new Menu;
        if ($search) {
            $menu = $menu->where('name', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }
        $tempMenu = $menu;
        $count = $tempMenu->count();
        if ($sort) {
            $orderName = request('mDataProp_' . request('iSortCol_0', ''), '');
            $menu = $menu->orderBy($orderName, $sort);
        }
        $menu = $menu->offset($start)
            ->limit($length)
            ->get();

        foreach ($menu as $v) {
            $v['actionButton'] = $v->GetActionButton();
        }
        $menu->isEmpty() ? $menu = [] : $menu = $menu->toArray();
        /*返回数据*/
        $returnData = [
            "sEcho" => $draw,
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "aaData" => $menu,
        ];
        return $returnData;
    }

    public function menus()
    {
        if (Cache::has(config('admin.global.cache.menu')))
            return Cache::get(config('admin.global.cache.menu'));
        $menusList = $this->setMenuListCache();
        return $menusList;
    }

    private function sortMenu($menus, $pid = 0)
    {
        $arr = [];
        foreach ($menus as $k => $v) {
            if ($v['pid'] == $pid) {
                $arr[$k] = $v;
                $arr[$k]['child'] = self::sortMenu($menus, $v['id']);
            }
        }
        return $arr;
    }

    function setMenuListCache()
    {
        $menus = Menu::where('language', config('app.locale'))
            ->orderBy('sort', 'desc')
            ->orderBy('id', 'asc')
            ->get();
        $menus->isEmpty() ? $menus = [] : $menus = $menus->toArray();
        if (!empty($menus)) {
            $menuList = $this->sortMenu($menus);
            foreach ($menuList as &$v) {
                if ($v['child']) {
                    $sort = array_column($v['child'], 'sort');
                    arsort($sort);
                    array_multisort($sort, SORT_DESC, $v['child']);
                }
            }
            Cache::forever(config('admin.global.cache.menu'), $menuList);
        }
        return $menuList;
    }
}