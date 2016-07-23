<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 10:22
 */
namespace app\modules\admin\controllers;

class AccountController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }


}