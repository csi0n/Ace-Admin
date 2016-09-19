<?php

namespace App\Models;

use App\Traits\ActionButton;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use ActionButton;
    protected $fillable = ['name', 'pid', 'language', 'icon', 'slug', 'url', 'description', 'sort', 'status'];

    /**
     * Permission constructor.
     */
    public function __construct()
    {
        $this->permission_edit = config('admin.permissions.menu.edit');
        $this->permission_delete = config('admin.permissions.menu.delete');
        $this->module = config('admin.module.menu');
    }
}
