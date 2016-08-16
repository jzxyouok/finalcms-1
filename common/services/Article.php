<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/8/12
 * Time: 22:35
 */
namespace common\services;

use common\models\ArticleContent;
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
            $secondCateId = $cateId;
        } else {
            $arrParentId = explode('-', $cate['arr_parent_id']);
            $secondCateId = $arrParentId[2];
        }
        $query = \common\models\Article::findByTableId($secondCateId);
        $list = $query->offset($offset)->limit($limit)->asArray()->all();

        foreach($list as &$one) {
            $tableId = $one['table_id'];
            $articleContent = ArticleContent::findByTableId($secondCateId, $tableId)
                ->select('id,title,keywords,description,cover_img')
                ->where(['id' => $one['id']])
                ->asArray()
                ->one();
            $one['title'] = $articleContent['title'];
            $one['keywords'] = $articleContent['keywords'];
            $one['description'] = $articleContent['description'];
            $one['cover_img'] = $articleContent['cover_img'];
        }

        return $list;
    }



}