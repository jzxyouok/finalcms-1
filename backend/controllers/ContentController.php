<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 10:21
 */
namespace backend\controllers;

use common\models\ArticleSearch;
use common\models\Category;
use common\models\CategorySearch;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class ContentController extends BaseController
{
    public $leftSideBar = 'content';

    public function actionIndex()
    {
        $request = Yii::$app->request;
        $searchModel = new CategorySearch();
        if ($request->get('CategorySearch')) {
            $cates = $searchModel->search($request->queryParams);
            $cates = \common\services\Category::tableData(ArrayHelper::toArray($cates));
        } else {
            $cates = \common\services\Category::all();
            $cates = \common\services\Category::tableData($cates);
        }
        $data = \common\services\Category::selectData();
        return $this->render('index', [
            'cates' => $cates,
            'searchModel' => $searchModel,
            'data' => $data,
        ]);
    }

    public function actionList()
    {
        $request = Yii::$app->request;
        $cateId = $request->get('cid');
        $cate = Category::find()->where(['id' => $cateId])->asArray()->one();
        $modelId = $cate['modelid'];
        if ($modelId == 0) {
            return $this->redirect(Url::to(['content/page', 'cid' => $cateId]));
        } elseif($modelId == 1) {
            $level = $cate['level'];
            if ($level == 2) {
                $tableId = $cateId;
            } else {
                $arrParentId = explode('-', $cate['arr_parent_id']);
                $tableId = $arrParentId[2];
            }
            $searchModel = new ArticleSearch($tableId);
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('article_list', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } elseif($modelId == 2) {
            //TODO
            return $this->render('image_list');
        }
    }

    public function actionPage()
    {

    }


    public function actionCreate()
    {

    }


    public function actionUpdate()
    {

    }


}