<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/29/16
 * Time: 20:58
 */

namespace App\Repositories\IAdmin;


use App\Repositories\IAdmin\Ext\IBaseRepository;

interface IUserRepository extends IBaseRepository
{
    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc ajax用户
     * @return mixed
     */
    public function ajaxIndex();
}