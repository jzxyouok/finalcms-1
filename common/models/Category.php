<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parentid
 * @property string $arr_parent_id
 * @property integer $has_child
 * @property string $name
 * @property integer $level
 * @property integer $listorder
 * @property integer $type
 * @property string $urlpath
 * @property string $sub_domain
 * @property string $template_index
 * @property string $template_list
 * @property string $template_article
 * @property integer $modelid
 * @property string $image
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $meta_title
 * @property string $setting
 * @property string $created_at
 * @property string $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    const TYPE_NORMAL = 1;
    const TYPE_CHANNEL = 2;
    const TYPE_LINK = 3;

    public static $types = [
        1 => '最终列表栏目',
        2 => '频道封面',
        3 => '外部链接',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function rules()
    {
        $normal = function ($model) {
            return $model->type == static::TYPE_NORMAL;
        };
        $channel = function ($model) {
            return $model->type == static::TYPE_CHANNEL;
        };
        $link = function ($model) {
            return $model->type == static::TYPE_LINK;
        };

        $typesRange = array_keys(static::$types);
        return [

            ['type', 'in', 'range' => $typesRange, 'message' => '栏目类型错误。'],
            ['listorder', 'required'],
            ['listorder', 'integer'],
            ['parentid', 'required'],
            ['parentid', 'integer'],
            ['level', 'integer'],

            ['meta_title', 'safe'],
            ['meta_keywords', 'safe'],
            ['meta_description', 'safe'],
            ['sub_domain', 'safe'],

            ['modelid', 'required', 'when' => $normal],
            ['name', 'required', 'when' => $normal],
            ['urlpath', 'validateUrlpath', 'when' => $normal, 'skipOnEmpty' => false, 'skipOnError' => false],
            ['template_index', 'required', 'when' => $normal],
            ['template_list', 'required', 'when' => $normal],
            ['template_article', 'required', 'when' => $normal],

            ['modelid', 'required', 'when' => $channel],
            ['name', 'required', 'when' => $channel],
            ['urlpath', 'validateUrlpath', 'when' => $channel, 'skipOnEmpty' => false, 'skipOnError' => false],
            ['template_index', 'required', 'when' => $channel],
            ['template_list', 'required', 'when' => $channel],
            ['template_article', 'required', 'when' => $channel],

            ['modelid', 'default', 'value' => 0, 'when' => $link],
            ['name', 'required', 'when' => $link],
            ['urlpath', 'url', 'when' => $link, 'message' => '外部链接不是一条有效的URL！'],
            ['urlpath', 'required', 'when' => $link, 'message' => '外部链接不能为空！'],
        ];
    }

    public function validateUrlpath($attribute, $params)
    {
        if ($this->sub_domain == 'www' && empty($this->urlpath)) {
            $this->addError($attribute, '没有绑定个性化子域名，请填写URL路径！');
        }

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '栏目ID',
            'parentid' => '栏目父ID',
            'arr_parent_id' => 'Arr Parent ID',
            'has_child' => 'Has Child',
            'name' => '栏目名称',
            'listorder' => '排序',
            'type' => '栏目类型',
            'urlpath' => '栏目路径',
            'sub_domain' => '子域名',
            'template_index' => '封面模板',
            'template_list' => '列表模板',
            'template_article' => '文章模板',
            'modelid' => '内容模型',
            'image' => 'Image',
            'meta_description' => 'Meta描述',
            'meta_keywords' => 'Meta关键字',
            'meta_title' => 'Meta标题',
            'setting' => '其他设置',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
