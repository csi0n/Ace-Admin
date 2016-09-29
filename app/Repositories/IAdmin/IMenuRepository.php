<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/29/16
 * Time: 20:37
 */

namespace App\Repositories\IAdmin;

use App\Repositories\IAdmin\Ext\IBaseRepository;

interface IMenuRepository extends IBaseRepository
{
    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc ajax菜单
     * @return mixed
     */
    public function ajaxIndex();

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 菜单排序
     * @return mixed
     */
    public function sort();

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 菜单列表
     * @return mixed
     */
    public function menus();
}