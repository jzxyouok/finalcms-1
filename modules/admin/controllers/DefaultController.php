<?php

namespace app\modules\admin\controllers;
use app\modules\admin\models\LoginForm;
use Yii;
/**
 * Default controller for the `admin` module
 */
class DefaultController extends BaseController
{
    public $leftSideBar = 'default';

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
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionRegister()
    {

    }
}
