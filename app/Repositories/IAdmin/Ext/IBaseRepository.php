<?php
namespace App\Repositories\IAdmin\Ext;

/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/29/16
 * Time: 20:32
 */
interface IBaseRepository
{
    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc Index首页
     * @return mixed
     */
    public function index();

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc GET创建
     * @return mixed
     */
    public function create();

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc POST创建
     * @param $request
     * @return mixed
     */
    public function store($request);

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc GET编辑
     * @param $id
     * @return mixed
     */
    public function edit($id);

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc POST编辑
     * @param $id
     * @param $request
     * @return mixed
     */
    public function update($id, $request);

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc POST删除
     * @param $id
     * @return mixed
     */
    public function destroy($id);
}