<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/29/16
 * Time: 20:55
 */

namespace App\Repositories\IAdmin;

use App\Repositories\IAdmin\Ext\IBaseRepository;

interface IPermissionRepository extends IBaseRepository
{
    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc ajax权限
     * @return mixed
     */
    public function ajaxIndex();

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 获取所有权限
     * @return mixed
     */
    public function GetAllPermissionArray();
}