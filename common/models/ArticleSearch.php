<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 16/8/15
 * Time: 下午4:29
 */
namespace common\models;

use yii\data\ActiveDataProvider;

class ArticleSearch extends Article
{



    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::findByTableId(static::$_tableId);

        $this->load($params);

        if (!$this->validate()) {
            return [];
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cate_arr_id' => $this->cate_arr_id,
        ]);

        $query->orderBy('id desc');
        return $query->all();
    }
    
}