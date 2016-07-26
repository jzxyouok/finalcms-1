<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\User */

include(Yii::getAlias('@backend/views/base.php'));

$this->title = '新增用户';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-4">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
