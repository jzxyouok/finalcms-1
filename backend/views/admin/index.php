<?php
include(Yii::getAlias('@backend/views/base.php'));

$this->title = '管理员管理';
$this->params['breadcrumbs'][] = $this->title;
?>
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