<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 10:17
 */

namespace app\modules\admin\controllers;

class MyController extends BaseController
{
    public $leftSideBar = 'my';

    public function actionIndex()
    {
        return $this->render('index');
    }


}