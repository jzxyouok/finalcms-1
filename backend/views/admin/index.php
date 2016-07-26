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
        'id',
        'username',
        'realname',
        'mobile',
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


<?php
$modal = \yii\bootstrap\Modal::begin([
    'header' => '<h2>修改密码</h2>',
    'toggleButton' => false,
]);
?>
<form class="form-inline" action="/admin/update-pwd" id="updatePwdForm">
    <div class="alert alert-success hidden" id="updatePwdSuccAlert">
        <a href="#" class="close" data-dismiss="alert">
            &times;
        </a>
        <span id="updatePwdSuccText"></span>
    </div>
    <div class="alert alert-warning hidden" id="updatePwdErrorAlert">
        <a href="#" class="close" data-dismiss="alert">
            &times;
        </a>
        <span id="updatePwdErrorText"></span>。
    </div>
    <div class="form-group">
        <label class="sr-only" for="username">用户名</label>
        <input type="hidden" name="userId" value="" id="userId">
        <input type="text" class="form-control" id="updateUsername" placeholder="用户名" disabled>
    </div>
    <div class="form-group">
        <label class="sr-only" for="password">密码</label>
        <input type="password" class="form-control" id="updatePassword" name="updatePassword" placeholder="密码" >
    </div>
    <button type="button" class="btn btn-default" id="updatePwdBtn" data-loading-text="sending...">提交</button>
</form>
<?php
\yii\bootstrap\Modal::end();
?>

<?php
$pageJs = <<<EOF
    $(document).on('pjax:send', function(){
        $('button[data-loading-text]').button('loading');
    });

    $('.modal-update-pwd').click(function() {
        var uid = $(this).attr('modal-data-uid');
        var username = $(this).attr('modal-data-username');
        $('#userId').val(uid);
        $('#updateUsername').val(username);
        $('#updatePassword').val('');
        $('#{$modal->id}').modal();

        $('#updatePwdSuccAlert').addClass('hidden');
        $('#updatePwdSuccText').text('');
        $('#updatePwdErrorAlert').addClass('hidden');
        $('#updatePwdErrorText').text('');
    });
    jQuery('#updatePwdBtn').click(function() {
        $('#updatePwdBtn').button('loading');
        var form = $('form#updatePwdForm');
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function (data) {
                $('#updatePwdBtn').button('reset');
                if (data.error=='0') {
                    $('#updatePwdSuccAlert').removeClass('hidden');
                    $('#updatePwdSuccText').text(data.msg);
                } else {
                    $('#updatePwdErrorAlert').removeClass('hidden');
                    $('#updatePwdErrorText').text(data.msg);
                }
            }
        });
    });
EOF;
$this->registerJs($pageJs);
?>
