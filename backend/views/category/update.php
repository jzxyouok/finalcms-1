<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

include(Yii::getAlias('@backend/views/base.php'));

$this->title = '更新栏目: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '栏目管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => \common\services\Category::cateName($model->id), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新栏目';
?>
<div class="category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
