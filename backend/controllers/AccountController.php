<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 10:22
 */
namespace backend\controllers;

use Yii;

class AccountController extends BaseController
{
    public $leftSideBar = 'account';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdd()
    {
        return $this->render('index');
    }


}