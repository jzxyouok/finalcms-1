<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 12:16
 */
namespace backend\controllers;

class CategoryController extends BaseController
{
    public $leftSideBar = 'content';

    public function actionIndex()
    {
        return $this->render('index');
    }

}