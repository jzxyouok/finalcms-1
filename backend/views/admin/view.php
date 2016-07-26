<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/26
 * Time: 22:14
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

include(Yii::getAlias('@backend/views/base.php'));

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '管理员管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'realname',
            'email:email',
            'mobile',
            [
                'label' => '状态',
                'value' =>  \backend\models\Admin::getStatus()[$model->status],
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>