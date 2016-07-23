<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model backend\models\LoginForm */

$this->title = 'Login';
$this->registerCssFile('/css/signin.css',
    ['depends'=>
        ['yii\web\YiiAsset','yii\bootstrap\BootstrapAsset',]
    ]);
?>
<div class="container">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-signin'],
        'fieldConfig' => [
            'template' => "{input}",
            'labelOptions' => ['class' => 'form-control'],
        ],
    ]); ?>
    <h2 class="form-signin-heading">请登录</h2>
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

    <?= $form->field($model, 'rememberMe', [
        'template' => "{input}{error}",
    ])->checkbox() ?>


    <?= Html::submitButton('登录', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button']) ?>

    <?php ActiveForm::end(); ?>

</div>

