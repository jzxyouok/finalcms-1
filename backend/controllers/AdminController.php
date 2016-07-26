<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 19:17
 */
namespace backend\controllers;

use backend\models\Admin;
use backend\models\AdminCreateForm;
use backend\models\AdminSearch;
use backend\models\AdminUpdateForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class AdminController extends BaseController
{
    public $leftSideBar = 'account';

    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return string
     */
    public function actionCreate()
    {
        $model = new AdminCreateForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->register()) {
                Yii::$app->session->setFlash('success', '注册成功');
                $model = new AdminCreateForm();
            } else {
                Yii::$app->session->setFlash('error', '注册失败');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return string
     */
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

    /**
     * @return array
     */
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

    /**
     * Displays a single Admin model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}