<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 19:17
 */
namespace backend\controllers;

use backend\models\Admin;
use backend\models\AdminAddForm;
use backend\models\AdminUpdateForm;
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
            'email' => $searchModel->email,
            'realname' => $searchModel->realname,
        ]);
        $query->andFilterWhere(
            ['like', 'username', $searchModel->username]
        );
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
            'searchModel' => $searchModel,
        ]);
    }

    public function actionAdd()
    {
        $model = new AdminAddForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->register()) {
                Yii::$app->session->setFlash('success', '注册成功');
                $model = new AdminAddForm();
            } else {
                Yii::$app->session->setFlash('error', '注册失败');
            }
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $admin = Admin::findOne($id);
        $model = new AdminUpdateForm();
        $model->username = $admin->username;
        $model->realname = $admin->realname;
        $model->email = $admin->email;
        $model->mobile = $admin->mobile;
        if ($request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->update($admin)) {
                    Yii::$app->session->setFlash('success', '更新成功');
                } else {
                    Yii::$app->session->setFlash('error', '更新失败');
                }
            }
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdatePwd()
    {
        $request = Yii::$app->request;
        $uid = $request->post('userId');
        $password = $request->post('updatePassword');

        $admin = Admin::findOne($uid);
        $admin->setPassword($password);
        $save = $admin->save();
        if ($save) {
            return ['error' => 0, 'msg' => '更新密码成功'];
        } else {
            return ['error' => 1, 'msg' => current( $admin->getFistErrors())];
        }
    }


}