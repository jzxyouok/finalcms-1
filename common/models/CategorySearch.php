<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Category;

/**
 * CategorySearch represents the model behind the search form about `common\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parentid', 'has_child', 'listorder', 'type', 'modelid', 'created_at', 'updated_at'], 'integer'],
            [['arr_parent_id', 'name', 'urlpath', 'template_index', 'template_list', 'template_article', 'image', 'meta_description', 'meta_keywords', 'meta_title', 'setting'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Category::find();

        $this->load($params);

        if (!$this->validate()) {
            return [];
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'parentid' => $this->parentid,
            'modelid' => $this->modelid,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->orderBy('listorder asc,id asc');
        return $query->all();
    }
}
