<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CategorySearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'inline',
        'options' => [
            'data-pjax' => 1,
        ]
    ]); ?>

    <?= $form->field($model, 'id')->textInput([
        'placeholder' => '栏目ID'
    ]) ?>

    <?= $form->field($model, 'parentid')->textInput([
        'placeholder' => '栏目父ID'
    ]) ?>

    <?= $form->field($model, 'name')->textInput([
        'placeholder' => '栏目名称'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>