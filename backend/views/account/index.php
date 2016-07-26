<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

include(Yii::getAlias('@backend/views/base.php'));

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="clearfix" style="margin-bottom: 10px;"></div>

    <p>
        <?= Html::a('创建用户', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
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
                'label' => '账号',
                'attribute' => 'account',
                'content' => function($dataProvider){
                    return $dataProvider['mobile'] ? : $dataProvider['email'];
                },
            ],
            [
                'attribute' => 'status',
                'filter' => Html::activeDropDownList($searchModel, 'status', \common\models\User::getStatus(), ['class' => 'form-control']),
                'value' => function ($data) {
                    return \common\models\User::getStatus()[$data->status];
                },
            ],
            'created_at:datetime',
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
