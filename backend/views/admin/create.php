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
$this->params['breadcrumbs'][] = ['label' => '管理员管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-4">
    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
    ]); ?>

    <?= $form->field($model, 'username', [
        'inputOptions' => [
            'placeholder' => '用户名'
        ],
    ]) ?>

    <?= $form->field($model, 'password', [
        'inputOptions' => [
            'placeholder' => '密码'
        ],
    ])->passwordInput() ?>

    <?= $form->field($model, 'repassword', [
        'inputOptions' => [
            'placeholder' => '重复密码'
        ],
    ])->passwordInput() ?>

    <?= $form->field($model, 'realname', [
        'inputOptions' => [
            'placeholder' => '真实姓名'
        ],
    ]) ?>

    <?= $form->field($model, 'email', [
        'inputOptions' => [
            'placeholder' => '邮箱'
        ],
    ]) ?>

    <?= $form->field($model, 'mobile', [
        'inputOptions' => [
            'placeholder' => '手机'
        ],
    ]) ?>

    <div class="form-group">
    <?= Html::submitButton('注册', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'reg-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
