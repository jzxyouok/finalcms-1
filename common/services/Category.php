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

    /**
     * @param $type
     * @return string
     */
    public static function typeName($type)
    {
        switch ($type) {
            case CategoryModel::TYPE_NORMAL :
                $typeName = '列表栏目';
                break;
            case CategoryModel::TYPE_CHANNEL :
                $typeName = '频道封面';
                break;
            case CategoryModel::TYPE_LINK :
                $typeName = '外部链接';
                break;
            default :
                $typeName = '未知';
                break;
        }
        return $typeName;
    }

    public static function cateName($pid)
    {
        $cateName = '';
        if (!$pid) {
            $cateName = '顶级栏目';
        } else {
            $parent = CategoryModel::findOne($pid);
            $parentParentId = $parent['parentid'];
            if (!$parentParentId) {
                $cateName = $parent['name'];
            } else {
                $arrParentId = $parent['arr_parent_id'];
                $arrParentId = explode('-', $arrParentId);
                current($arrParentId);
                $cates = CategoryModel::findAll(['id' => $arrParentId]);
                foreach ($cates as $cate) {
                    $cateName .= $cate['name'] . '-';
                }
                $cateName .= $parent['name'];
            }

        }
        return $cateName;
    }

    public static function buildArrParentId($pid)
    {
        if (!$pid) {
            $arrParentId = 0;
        } else {
            $parent = CategoryModel::findOne($pid);
            $parentArrParentId = $parent['arr_parent_id'];
            $arrParentId = $parentArrParentId . '-' . $pid;
        }
        return $arrParentId;
    }


    public static function all()
    {
        $db = \Yii::$app->db;
        $sql = "select *,concat(arr_parent_id, '-', id) as rpi from category order by rpi asc";
        $result = $db->createCommand($sql)->queryAll();
        return $result;
    }

    public static function tableData($data)
    {
        $result = [];
        foreach ($data as $rk => $one) {
            $arrParentId = explode('-', $one['arr_parent_id']);
            $char = '----';
            $level = count($arrParentId);
            $thisChar = str_repeat($char, $level - 1);
            $cateName = $thisChar . $one['name'];
            $result[$rk] = $one;
            $result[$rk]['cate_name'] = $cateName;
        }
        return $result;
    }

    public static function selectData()
    {
        $result = static::all();
        $data = [];
        foreach ($result as $one) {
            $arrParentId = explode('-', $one['arr_parent_id']);
            $char = '----';
            $thisChar = '';
            foreach ($arrParentId as $key => $arrPid) {
                if($key >= 1) {
                    $thisChar .= $char;
                }
            }
            $cateName = $thisChar . $one['name'];
            $data[$one['id']] = $cateName;
        }
        return $data;
    }


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

    public static function children($cid)
    {
        if (!$cid) {
            $cid = 0;
        }
        $children = CategoryModel::find()->where(['parentid' => $cid])->asArray()->all();
        return $children;
    }

    public static function getFirstLevel()
    {
        return static::children(0);
    }







}