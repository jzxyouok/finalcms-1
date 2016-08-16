<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 10:21
 */
namespace backend\controllers;

use common\models\CategorySearch;
use common\services\Article;
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
        $cate = \common\services\Category::one($cateId);
        $modelId = $cate['modelid'];
        if ($modelId == 0) {
            return $this->redirect(Url::to(['content/page', 'cid' => $cateId]));
        } elseif($modelId == 1) {
            $list = Article::getList($cateId);
            return $this->render('article/list', [
                'articles' => $list,
            ]);
        } elseif($modelId == 2) {
            //TODO
            return $this->render('image/list');
        }
    }

    public function actionPage()
    {

    }


    public function actionCreate()
    {
        $request = Yii::$app->request;
        $cateId = $request->get('cid');
        $cate = \common\services\Category::one($cateId);
        $modelId = $cate['modelid'];
        if ($modelId == 0) {
            return $this->redirect(Url::to(['content/page', 'cid' => $cateId]));
        } elseif($modelId == 1) {
        //TODO
        } elseif($modelId == 2) {
        //TODO
        }
    }


    public function actionUpdate()
    {
        $request = Yii::$app->request;
        $cateId = $request->get('cid');
        $cate = \common\services\Category::one($cateId);
        $modelId = $cate['modelid'];
        if ($modelId == 0) {
            return $this->redirect(Url::to(['content/page', 'cid' => $cateId]));
        } elseif($modelId == 1) {
            //TODO
        } elseif($modelId == 2) {
            //TODO
        }
    }


}