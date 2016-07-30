<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

include(Yii::getAlias('@backend/views/base.php'));

$this->title = '查看栏目';
$this->params['breadcrumbs'][] = ['label' => '栏目管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parentid',
            'arr_parent_id',
            'has_child',
            'name',
            'listorder',
            'type',
            'urlpath:url',
            'template_index',
            'template_list',
            'template_article',
            'modelid',
            'image',
            'meta_description',
            'meta_keywords',
            'meta_title',
            'setting:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
