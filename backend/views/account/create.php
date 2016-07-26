<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\User */

include(Yii::getAlias('@backend/views/base.php'));

$this->title = '添加用户';
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-4">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
