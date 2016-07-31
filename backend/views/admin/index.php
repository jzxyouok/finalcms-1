<?php
include(Yii::getAlias('@backend/views/base.php'));

$this->title = '管理员管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php \yii\widgets\Pjax::begin([
    'clientOptions' => [
        'show' => 'fade'
    ],
]); ?>


<?php echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="clearfix" style="margin-bottom: 10px;"></div>

<p>
    <?= \yii\helpers\Html::a('创建管理员', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?=
\yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'id',
            'options'=>[
                'width'=>'120',
                'style'=>'text-align:center',
            ],
        ],
        [
            'attribute' => 'username',
            'options'=>[
                'width'=>'120',
                'style'=>'text-align:center',
            ],
        ],
        [
            'attribute' => 'mobile',
            'options'=>[
                'width'=>'100',
                'style'=>'text-align:center',
            ],
        ],
        'email:email',
        [
            'attribute' => 'created_at',
            'format' =>  ['date', 'php:Y-m-d H:i:s'],
        ],
        [
            'attribute' => 'status',
            'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'status',\backend\models\Admin::getStatus(), ['class' => 'form-control']),
            'value' => function ($data) {
                return \common\models\User::getStatus()[$data->status];
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => '操作',
            'template' => '{view} {update} {password} {delete}',
            'headerOptions' => ['width' => '128', 'class' => 'padding-left-5px',],
            'contentOptions' => ['class' => 'padding-left-5px'],
            'buttons' => [
                'password' => function ($url, $model, $key) {
                    return \yii\helpers\Html::a('<span class="glyphicon glyphicon-edit"></span>', 'javascript:;', [
                        'title' => '修改密码',
                        'modal-data-uid' => $model->id,
                        'modal-data-username' => $model->username,
                        'class' => 'modal-update-pwd',
                    ]);
                },
            ],
        ],
    ],
]); ?>
<?php \yii\widgets\Pjax::end(); ?>



<?php echo $this->render('_updatePasswordModal'); ?>
