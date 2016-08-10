<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/30
 * Time: 20:04
 */
namespace common\services;

use yii\db\Schema;

class Model
{

    public static function idIndexName()
    {
        return ['1'=>'文章模型','2'=>'图片模型'];
    }

    public static function createModelTable($modelId, $cateId)
    {
        $model = Category::findOne($cateId);
        $cateLevel = count(explode('-', $model->arr_parent_id));
        if ($cateLevel != 2) {
            return false;
        }
        switch ($modelId) {
            case 1 :
                static::createArticleTable($model);
                break;
            case 2 :
                static::createPictureTable($model);
                break;
            default :
                break;
        }
    }

    public static function createArticleTable(\common\models\Category $model)
    {

        $db = \Yii::$app->db;
        $tableOptions = null;
        if ($db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $arrParentId = implode('_', $model->arr_parent_id);

        //大类筛选表创建
        $tableName = 'articles_';
        $tableName .= $arrParentId[1];
        $db->createCommand()->createTable($tableName, [
        //TODO
        ], $tableOptions);
        //大类内容分表创建
        $tableName = 'articles_';
        $tableName .= $arrParentId[1];
        for($i=100;$i<110;$i++) {
            $curTableName = $tableName . '_' . $i;
            $db->createCommand()->createTable($curTableName, [
                //TODO
            ], $tableOptions);
        }
    }

    public static function createPictureTable(\common\models\Category $model)
    {

    }


}