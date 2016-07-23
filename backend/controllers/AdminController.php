<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 19:17
 */
namespace backend\controllers;

use backend\models\Admin;
use backend\models\RegisterForm;
use Yii;
use yii\data\ActiveDataProvider;

class AdminController extends BaseController
{
    public $leftSideBar = 'account';

    public function actionIndex()
    {
        $request = Yii::$app->request;
        $searchModel = new Admin();
        $searchModel->setAttributes($request->get(), false);
        $model = new Admin();
        $query = Admin::find();
        $query->filterWhere([
            'username' => $searchModel->username,
            'email' => $searchModel->email,
            'realname' => $searchModel->realname,
        ]);
        $dataProvider = new ActiveDataProvider([
            'query' =>$query,
            'pagination' => ['pageSize' => 10],
            'sort' => [
                'attributes' => [
                    'created_at',
                    'id'
                ]
            ],
        ]);


        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'get' => $request->get(),
        ]);
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