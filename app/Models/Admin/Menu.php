<?php

namespace App\Models\Admin;
use App\Models\Admin\Ext\BaseModel;
use App\Traits\ActionButton;

class Menu extends BaseModel
{
    use ActionButton;
    protected $fillable = ['name', 'pid', 'language', 'icon', 'slug', 'url', 'description', 'sort', 'status'];

    /**
     * Permission constructor.
     */
    public function __construct()
    {
        $this->_permission_edit = config('admin.permissions.menu.edit');
        $this->_permission_delete = config('admin.permissions.menu.delete');
        $this->_module = config('admin.module.menu');
    }
}
