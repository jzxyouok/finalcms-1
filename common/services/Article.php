<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/8/12
 * Time: 22:35
 */
namespace common\services;

use common\models\Category as CategoryModel;

class Article
{

    public static function info($articleId)
    {

    }

    public static function photoList($articleId)
    {

    }

    public static function getList($cateId, $offset = 0, $limit = 10)
    {
        $cate =  CategoryModel::find()->where(['id' => $cateId])->asArray()->one();
        $level = $cate['level'];
        if ($level == 2) {
            $tableId = $cateId;
        } else {
            $arrParentId = explode('-', $cate['arr_parent_id']);
            $tableId = $arrParentId[2];
        }
        $query = \common\models\Article::findByTableId($tableId);
        $result = $query->offset($offset)->limit($limit)->all();
        return $result;
    }



}