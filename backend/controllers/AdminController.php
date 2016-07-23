<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 19:17
 */
namespace backend\controllers;
use backend\models\RegisterForm;
use Yii;

class AdminController extends BaseController
{
    public $leftSideBar = 'account';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdd()
    {
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->register()) {
                Yii::$app->session->setFlash('success', '注册成功');
                $model = new RegisterForm();
            } else {
                Yii::$app->session->setFlash('error', '注册失败');
            }
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }


}