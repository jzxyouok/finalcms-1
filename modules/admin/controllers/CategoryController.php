<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 12:16
 */
namespace app\modules\admin\controllers;

class CategoryController extends BaseController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}