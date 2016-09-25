<?php
namespace App\Traits;
use Form;
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/19/16
 * Time: 15:14
 */
trait ActionButton
{
    public $_permission_edit;
    public $_permission_delete;
    public $_module;

    public function createEditButton()
    {
        if (auth()->user()->can($this->_permission_edit)) {
            return '<a class="green" href="' . route($this->_module.'.edit',$this->id) . '"><i class="icon-pencil bigger-130"></i></a>';
        }
        return '';
    }

    public function createDeleteButton()
    {
        if (auth()->user()->can($this->_permission_delete)) {
            return '<a href="javascript:;" onclick="return false" class="red" id="destroy"><i class="icon-trash bigger-130"></i>'.Form::open(array('route'=>[$this->_module.'.destroy',$this->id],'method'=>'delete','name'=>'delete_item')).Form::close().'</a>';
        }
        return '';
    }

    public function GetActionButton()
    {
        return '<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">'.$this->createEditButton().$this->createDeleteButton().'</div>';
    }
}