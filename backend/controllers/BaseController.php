<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 9:53
 */
namespace backend\controllers;

use yii\web\Controller;
use yii\web\Response;

class BaseController extends Controller
{
    public $leftSideBar;


    public function beforeAction($action)
    {
        $request = \Yii::$app->request;
        if ($request->isAjax) {
            $response = \Yii::$app->response;
            $response->format = Response::FORMAT_JSON;
        }
        return parent::beforeAction($action);
    }

}