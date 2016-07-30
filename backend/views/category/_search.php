<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'inline',
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
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
