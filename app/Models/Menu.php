<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name','pid','language','icon','slug','url','description','sort','status'];
}
