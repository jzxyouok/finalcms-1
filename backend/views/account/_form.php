<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'account', [
        'inputOptions' => [
            'placeholder' => '手机/邮箱'
        ],
    ])->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password', [
        'inputOptions' => [
            'placeholder' => '密码'
        ],
    ])->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'repassword', [
        'inputOptions' => [
            'placeholder' => '重复密码'
        ],
    ])->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton( '新增', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
