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

class MenusRepository extends BaseRepository
{
    public function menus()
    {
        if (Cache::has(config('admin.global.cache.menu')))
            return Cache::get(config('admin.global.cache.menu'));
        $menusList = $this->setMenuListCache();
        return $menusList;
    }

    private function sortMenu($menus,$pid = 0){
        $arr = [];
        foreach($menus as $k =>  $v){
            if($v['pid'] == $pid){
                $arr[$k] = $v;
                $arr[$k]['child'] = self::sortMenu($menus,$v['id']);
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
               foreach ($menuList as &$v){
                   if ($v['child']){
                       $sort=array_column($v['child'],'sort');
                       arsort($sort);
                       array_multisort($sort,SORT_DESC,$v['child']);
                   }
               }
               Cache::forever(config('admin.global.cache.menu'),$menuList);
            }
            return $menuList;
        }
}