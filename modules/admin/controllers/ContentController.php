<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 10:21
 */
namespace app\modules\admin\controllers;

class ContentController extends BaseController
{
    public $leftSideBar = 'content';

    public function actionIndex()
    {
        return $this->render('index');
    }


}