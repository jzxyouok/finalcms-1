<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
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

    <?= $form->field($model, 'parentid')->widget(Select2::classname(), [
        'data' => $data,
        'language' => 'de',
        'options' => ['placeholder' => '选择父栏目'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'name')->textInput([
        'placeholder' => '栏目名称'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>