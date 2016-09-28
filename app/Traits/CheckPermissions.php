<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/28/16
 * Time: 10:39
 */

namespace App\Traits;


trait CheckPermissions
{
    public $_key;

    public $_config_prefix;

    /**
     * CheckPermissions constructor.
     */
    public function init()
    {
        $permissions = config(empty($_config_prefix) ? 'admin.permissions.' . $this->_key : $this->_config_prefix . '.permissions.' . $this->_key);
        foreach ($permissions as $k => $v) {
            if (!empty($v['only']))
                $this->middleware('checkPermission:' . $v['name'], ['only' => $v['only']]);
            if (!empty($v['except']))
                $this->middleware('checkPermission:' . $v['name'], ['except' => $v['except']]);
        }
    }
}