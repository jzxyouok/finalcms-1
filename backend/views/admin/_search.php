<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/26
 * Time: 21:52
 */
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;

?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'layout' => 'inline',
    'options' => [
        'data-pjax' => 1,
    ]
]); ?>

<?= $form->field($model, 'id', [
    'inputOptions' => [
        'placeholder' => '用户ID'
    ],
]) ?>

<?= $form->field($model, 'username', [
    'inputOptions' => [
        'placeholder' => '用户名'
    ],
]) ?>

<?= $form->field($model, 'email', [
    'inputOptions' => [
        'placeholder' => '邮箱'
    ],
]) ?>

<?= $form->field($model, 'mobile', [
    'inputOptions' => [
        'placeholder' => '手机号码'
    ],
]) ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary', 'data-loading-text' => '加载中...']) ?>
        <?= Html::resetButton('重置搜索', ['class' => 'btn btn-default']) ?>
    </div>

<?php ActiveForm::end(); ?>