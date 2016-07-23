<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
NavBar::begin([
    'brandLabel' => 'finalcms',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-default navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => [
        ['label' => '我的面板', 'url' => ['/my/index']],
        ['label' => '内容', 'url' => ['/content/index']],
        ['label' => '用户', 'url' => ['/account/index']],
        ['label' => '设置', 'url' => ['/setting/index']],
    ],
]);
?>

<form class="navbar-form navbar-left" role="search">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="搜索">
    </div>
    <button type="submit" class="btn btn-default">提交</button>
</form>

<?php

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        Yii::$app->user->isGuest ? (
        ['label' => '登录', 'url' => ['/site/login']]
        ) : (
            '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
            . Html::submitButton(
                '退出 (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>'
        )
    ],
]);

NavBar::end();
?>

<div class="container-fluid" style="margin-top: 52px;">
    <div class="row">
        <div class="col-sm-2 col-md-2 sidebar">
            <?php if (isset($this->blocks['left'])): ?>
                <?= $this->blocks['left'] ?>
            <?php endif; ?>
        </div>
        <div class="col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2 main">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'homeLink' => ['label' => Yii::$app->name, 'url' => \yii\helpers\Url::to(['/'])],
            ]) ?>
            <?= backend\widgets\Alert::widget() ?>
            <?= $content; ?>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
