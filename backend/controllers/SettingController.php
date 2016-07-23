<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 10:22
 */
namespace backend\controllers;

class SettingController extends BaseController
{
    public $leftSideBar = 'setting';

    public function actionIndex()
    {
        return $this->render('index');
    }


}