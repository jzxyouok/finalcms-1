<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "articles_x".
 *
 * @property string $id
 * @property integer $cateid
 * @property integer $second_cate_id
 * @property string $cate_arr_id
 * @property integer $table_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Article extends \yii\db\ActiveRecord
{

    private static $_tableId;

    public static function instantiate($row)
    {
        return new static(static::$_tableId);
    }

    public function __construct($tableId, $config = [])
    {
        parent::__construct($config);
        static::$_tableId = $tableId;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        $tableId = static::$_tableId;
        return 'articles_' . $tableId;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cateid', 'second_cate_id', 'cate_arr_id', 'table_id', 'created_at', 'updated_at'], 'required'],
            [['id', 'cateid', 'second_cate_id', 'table_id', 'created_at', 'updated_at'], 'integer'],
            [['cate_arr_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cateid' => 'Cateid',
            'second_cate_id' => 'Second Cate ID',
            'cate_arr_id' => 'Cate Arr ID',
            'table_id' => 'Table ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    /**
     * @param $tableId
     * @return \yii\db\ActiveQuery the newly created [[ActiveQuery]] instance.
     */
    public static function findByTableId($tableId)
    {
        $model = new static($tableId);
        return $model::find();
    }

    /**
     * @param $tableId
     * @param $condition
     * @return \yii\db\ActiveRecord|null ActiveRecord instance matching the condition, or `null` if nothing matches.
     */
    public static function findOneByTableId($tableId, $condition)
    {
        $model = new static($tableId);
        return $model::findOne($condition);
    }

    /**
     * @param $tableId
     * @param $condition
     * @return \yii\db\ActiveRecord[] an array of ActiveRecord instances, or an empty array if nothing matches.
     */
    public static function findAllByTableId($tableId, $condition)
    {
        $model = new static($tableId);
        return $model::findAll($condition);
    }

}
