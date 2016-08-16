<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "articles_2_100".
 *
 * @property integer $id
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $content
 * @property string $cover_img
 * @property string $photo_list
 */
class ArticleContent extends \yii\db\ActiveRecord
{

    private static $_cateId;
    private static $_tableId;


    public static function instantiate($row)
    {
        return new static(static::$_cateId, static::$_tableId);
    }

    public function __construct($cateId, $tableId, $config = [])
    {
        parent::__construct($config);
        static::$_tableId = $tableId;
        static::$_cateId = $cateId;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        $tableId = static::$_tableId;
        $cateId = static::$_cateId;
        return 'articles_' . $cateId . '_' . $tableId;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title'], 'required'],
            [['id'], 'integer'],
            [['content', 'cover_img', 'photo_list'], 'string'],
            [['title'], 'string', 'max' => 150],
            [['keywords', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'content' => 'Content',
            'cover_img' => 'Cover Img',
            'photo_list' => 'Photo List',
        ];
    }

    /**
     * @param $tableId
     * @return \yii\db\ActiveQuery the newly created [[ActiveQuery]] instance.
     */
    public static function findByTableId($cateId,$tableId)
    {
        $model = new static($cateId,$tableId);
        return $model::find();
    }

    /**
     * @param $tableId
     * @param $condition
     * @return \yii\db\ActiveRecord|null ActiveRecord instance matching the condition, or `null` if nothing matches.
     */
    public static function findOneByTableId($cateId, $tableId, $condition)
    {
        $model = new static($cateId, $tableId);
        return $model::findOne($condition);
    }

    /**
     * @param $tableId
     * @param $condition
     * @return \yii\db\ActiveRecord[] an array of ActiveRecord instances, or an empty array if nothing matches.
     */
    public static function findAllByTableId($cateId, $tableId, $condition)
    {
        $model = new static($cateId, $tableId);
        return $model::findAll($condition);
    }
}
