<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Category */

include(Yii::getAlias('@backend/views/base.php'));

$this->title = '添加栏目';
$this->params['breadcrumbs'][] = ['label' => '栏目管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
