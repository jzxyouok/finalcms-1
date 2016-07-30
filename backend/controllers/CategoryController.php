<?php

namespace backend\controllers;

use common\models\Model;
use Yii;
use common\models\Category;
use common\models\CategorySearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends BaseController
{
    public $leftSideBar = 'content';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $searchModel = new CategorySearch();
        if ($request->get('CategorySearch')) {
            $cates = $searchModel->search($request->queryParams);
            $cates = \common\services\Category::talbleData(ArrayHelper::toArray($cates));
        } else {
            $cates = \common\services\Category::all();
            $cates = \common\services\Category::talbleData($cates);
        }
        $data = \common\services\Category::selectData();
        return $this->render('index', [
            'cates' => $cates,
            'searchModel' => $searchModel,
            'data' => $data,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Category();

        $parentid = $request->get('pid', 0);
        if ($request->isPost) {
            if ($model->load($request->post())) {
                $model->arr_parent_id = \common\services\Category::getArrParentId($model->parentid);
                if ($model->save()) {
                    Category::updateAll(['has_child' => 1], ['id' =>$model->parentid]);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->parentid = $parentid;
            $modelid = 1;
            $model->modelid = $modelid;
            $model->type = Category::TYPE_NORMAL;
            $model->listorder = 0;
            $modelModel = Model::findOne($modelid);
            $model->template_index = $modelModel->template_index;
            $model->template_list = $modelModel->template_list;
            $model->template_article = $modelModel->template_article;
        }
        return $this->render('create', [
            'model' => $model,
        ]);

    }

    public function actionValidateForm () {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new Category();
        $model->load(Yii::$app->request->post());
        return ActiveForm::validate($model);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        if ($request->isPost) {
            $post = Yii::$app->request->post();
            unset($post['Category']['parentid']);
            unset($post['Category']['arr_parent_id']);
            if ($model->load($post) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (!$model->has_child) {
            $parentId = $model->parentid;
            $delete = $model->delete();
            if ($delete) {
                $parentChildren = Category::find()->where(['parentid' => $parentId])->all();
                if (!$parentChildren) {
                    Category::updateAll(['has_child' => 0], ['id' => $parentId]);
                }
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
