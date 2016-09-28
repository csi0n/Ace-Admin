<?php

namespace App;

use App\Traits\ActionButton;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Bican\Roles\Traits\HasRoleAndPermission;
use Illuminate\Auth\Passwords\CanResetPassword;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract
{
    use Authenticatable, CanResetPassword, HasRoleAndPermission, ActionButton;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->_permission_delete = config('admin.permissions.user.delete');
        $this->_permission_edit = config('admin.permissions.user.edit');
        $this->_module = config('admin.module.user');
    }

    public function permission()
    {
        return $this->belongsToMany('App\Models\Admin\Permission','permission_user','user_id','permission_id')->withTimestamps();
    }

    public function role()
    {
        return $this->belongsToMany('App\Models\Admin\Role','role_user','user_id','role_id')->withTimestamps();
    }
}
