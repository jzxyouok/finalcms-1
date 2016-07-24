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

$this->title = '添加管理员';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-4 ">
    <?php $form = ActiveForm::begin([
        'id' => 'edit-register-form',
        'options' => ['class' => 'form-edit'],
    ]); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'realname') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'mobile') ?>

    <?= Html::submitButton('编辑', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'edit-button']) ?>

    <?php ActiveForm::end(); ?>

</div>
