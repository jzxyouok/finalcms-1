<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/24
 * Time: 10:45
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

include(Yii::getAlias('@backend/views/base.php'));

$this->title = '更新管理员';
$this->params['breadcrumbs'][] = ['label' => '管理员管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-4 ">
    <?php $form = ActiveForm::begin([
        'id' => 'edit-register-form',
        'options' => ['class' => 'form-edit'],
    ]); ?>

    <?= $form->field($model, 'username', [
        'inputOptions' => [
            'placeholder' => '用户名'
        ],
    ]) ?>

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

    <?= Html::submitButton('编辑', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'edit-button']) ?>

    <?php ActiveForm::end(); ?>

</div>
