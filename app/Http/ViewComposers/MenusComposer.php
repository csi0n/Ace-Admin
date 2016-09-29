<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/15
 * Time: 19:27
 */

namespace App\Http\ViewComposers;


use App\Http\ViewComposers\Ext\BaseComposer;
use App\Repositories\IAdmin\IMenuRepository;
use Illuminate\View\View;

class MenusComposer extends BaseComposer
{
    protected $menus;

    /**
     * MenusComposer constructor.
     * @param $menus
     */
    public function __construct(IMenuRepository $menus)
    {
        $this->menus = $menus;
    }

    public function compose(View $view){
        $view->with('menus',$this->menus->menus());
    }
}