<?php

namespace backend\controllers;
use backend\models\LoginForm;
use Yii;
/**
 * Site controller
 */
class SiteController extends BaseController
{
    public $leftSideBar = 'default';

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        $this->layout = 'blank';
        if (!\Yii::$app->admin->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return Yii::$app->getResponse()->redirect(Yii::$app->admin->getReturnUrl());
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        \Yii::$app->admin->logout();
        return $this->goHome();
    }

}
