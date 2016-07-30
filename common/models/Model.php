<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "models".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $tablename
 * @property string $template_index
 * @property string $template_list
 * @property string $template_article
 * @property integer $created_at
 */
class Model extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'tablename', 'template_index', 'template_list', 'template_article', 'created_at'], 'required'],
            [['created_at'], 'integer'],
            [['name', 'tablename', 'template_index', 'template_list', 'template_article'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'tablename' => 'Tablename',
            'template_index' => 'Template Index',
            'template_list' => 'Template List',
            'template_article' => 'Template Article',
            'created_at' => 'Created At',
        ];
    }

}
