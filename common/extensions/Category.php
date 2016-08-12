<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 16/8/12
 * Time: 上午11:21
 */
namespace common\extensions;

use common\models\Category as CategoryModel;

class Category
{
    public static function info($cateId)
    {
        $cate =  CategoryModel::find()->where(['id' => $cateId])->asArray()->one();
        return $cate;
    }

    public static function top($cateId)
    {
        $cate = \common\services\Category::top($cateId);
        return $cate;
    }

    public static function parent($cateId)
    {
        $cate = \common\services\Category::parent($cateId);
        return $cate;
    }

    public static function children($cateId)
    {
        $children = \common\services\Category::children($cateId);
        return $children;
    }

}