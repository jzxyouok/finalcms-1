<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 18:48
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

include(Yii::getAlias('@backend/views/base.php'));

$this->title = '添加管理员';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-4 ">
    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'form-register'],
        'fieldConfig' => [
            'template' => "{input}",
            'labelOptions' => ['class' => 'form-control'],
        ],
    ]); ?>

    <?= $form->field($model, 'username', [
        'template' => "{input}{error}",
        'inputOptions' => [
            'placeholder' => '用户名'
        ],
    ]) ?>

    <?= $form->field($model, 'password', [
        'template' => "{input}{error}",
        'inputOptions' => [
            'placeholder' => '密码'
        ],
    ])->passwordInput() ?>

    <?= $form->field($model, 'repassword', [
        'template' => "{input}{error}",
        'inputOptions' => [
            'placeholder' => '重复密码'
        ],
    ])->passwordInput() ?>

    <?= $form->field($model, 'realname', [
        'template' => "{input}{error}",
        'inputOptions' => [
            'placeholder' => '真实姓名'
        ],
    ]) ?>

    <?= $form->field($model, 'email', [
        'template' => "{input}{error}",
        'inputOptions' => [
            'placeholder' => '邮箱'
        ],
    ]) ?>

    <?= $form->field($model, 'mobile', [
        'template' => "{input}{error}",
        'inputOptions' => [
            'placeholder' => '手机'
        ],
    ]) ?>

    <?= Html::submitButton('注册', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'reg-button']) ?>

    <?php ActiveForm::end(); ?>

</div>
