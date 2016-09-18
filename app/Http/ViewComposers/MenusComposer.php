<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/15
 * Time: 19:27
 */

namespace app\Http\ViewComposers;


use Illuminate\View\View;
use MenuRepository as Menus;

class MenusComposer
{
    protected $menus;

    /**
     * MenusComposer constructor.
     * @param $menus
     */
    public function __construct(Menus $menus)
    {
        $this->menus = $menus;
    }

    public function compose(View $view){
        $menus=$this->menus;
        $view->with('menus',$menus::menus());
    }
}