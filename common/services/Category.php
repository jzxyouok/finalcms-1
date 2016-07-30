<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/29
 * Time: 21:24
 */
namespace common\services;

use common\models\Category as CategoryModel;

class Category
{

    public static function top($cateId)
    {

    }

    public static function parent($cateId)
    {
        if (!$cateId) {
            return [];
        }
        $cate =  CategoryModel::find()->where(['id' => $cateId])->one();
        $parent = CategoryModel::find()->where(['id' => $cate['parentid']])->one();
        return $parent;
    }

    public static function getChildren($cid)
    {
        if (!$cid) {
            $children = CategoryModel::find()->where(['parentid' => 0])->asArray()->all();
            return $children;
        } else {
            $cate = CategoryModel::findOne($cid);
            if ($cate) {
                $arrParentId = $cate['arr_parent_id'];
                $childrenArrParentId = $arrParentId . '-' . $cid;
                $children = CategoryModel::find()->where(['like', 'arr_parent_id', $childrenArrParentId . '%'])->asArray()->all();
                return $children;
            }
        }
        return [];
    }

    public static function getFirstLevel()
    {
        return static::getChildren(0);
    }







}