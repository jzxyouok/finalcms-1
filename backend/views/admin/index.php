<?php
include(Yii::getAlias('@backend/views/base.php'));

$this->title = '管理员管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<form class="form-inline">
    <div class="form-group">
        <label class="sr-only" for="email">邮箱</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="邮箱" value="">
    </div>
    <div class="form-group">
        <label class="sr-only" for="username">用户名</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="用户名">
    </div>
    <div class="form-group">
        <label class="sr-only" for="realname">真实姓名</label>
        <input type="text" class="form-control" id="realname" name="realname" placeholder="真实姓名">
    </div>
    <button type="submit" class="btn btn-default">搜索</button>
</form>

<div class="clearfix" style="margin-bottom: 10px;"></div>

<?=
\yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        [
            'attribute' => 'username',
        ],
        'email:email',
        [
            'attribute' => 'created_at',
            'format' =>  ['date', 'php:Y-m-d H:i:s'],
        ],
        'realname',
        'mobile',
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => '操作',
            'template' => '{view} {update}  {delete}',
            'headerOptions' => ['width' => '128', 'class' => 'padding-left-5px',],
            'contentOptions' => ['class' => 'padding-left-5px'],
        ],
    ],
]); ?>
