<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/30
 * Time: 20:04
 */
namespace common\services;


use common\models\Category as CategoryModel;

class Model
{

    public static function idIndexName()
    {
        return ['1'=>'文章模型','2'=>'图片模型'];
    }

    public static function createModelTable($modelId, $cateId)
    {
        $model = CategoryModel::findOne($cateId);
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

    public static function createArticleTable(CategoryModel $model)
    {

        $db = \Yii::$app->db;
        $secondCateId = $model->id;
        //二级分类筛选表创建
        $tableName = 'articles_';
        $tableName .= $secondCateId;

        $showTableSql = "show tables like '{$tableName}'";
        $hasTable = $db->createCommand($showTableSql)->queryOne();
        if ($hasTable) {
            return false;
        }

        $createTableSql = <<<EOF
CREATE TABLE `$tableName` (
  `id` bigint(20) unsigned  NOT NULL COMMENT '文章ID',
  `cateid` int(11) unsigned NOT NULL COMMENT '文章分类ID',
  `second_cate_id` int(11)  unsigned NOT NULL COMMENT '文章二级分类ID',
  `cate_arr_id` varchar (255) NOT NULL COMMENT '文章所属分类ID,下划线_连接',
  `table_id` int(11)  unsigned NOT NULL COMMENT '内容表分表ID',
  `created_at` int(11)  unsigned NOT NULL COMMENT '添加时间',
  `updated_at` int(11)  unsigned NOT NULL COMMENT '更新时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDb DEFAULT CHARSET=utf8;
EOF;
        $db->createCommand($createTableSql)->execute();
        //二级分类内容分表创建
        $tableName = 'articles_';
        $tableName .= $secondCateId;
        for($i=100;$i<110;$i++) {
            $curTableName = $tableName . '_' . $i;
            $curCreateTableSql = <<<EOF
CREATE TABLE `$curTableName` (
  `id` bigint(20) NOT NULL COMMENT '文章ID',
  `title` varchar(150) NOT NULL COMMENT '文章标题',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '文章关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '文章描述',
	`content` MEDIUMTEXT COMMENT '文章内容',
	`cover_img` MEDIUMTEXT COMMENT '文章封面',
	`photo_list` MEDIUMTEXT COMMENT '文章图集',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDb DEFAULT CHARSET=utf8;
EOF;
            $db->createCommand($curCreateTableSql)->execute();
        }
    }

    public static function createPictureTable(CategoryModel $model)
    {

    }


}