<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

include(Yii::getAlias('@backend/views/base.php'));

$cateName = \common\models\Category::cateName($searchModel['parentid']);
$this->title = '栏目管理';
$this->params['breadcrumbs'][] = ['label' => '栏目管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $cateName;
?>
<div class="category-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="clearfix" style="margin-bottom: 10px;"></div>

    <h1><?= $cateName;?></h1>

    <p>
        <?= Html::a('添加顶级栏目', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table table-hover table-condensed table-bordered">
        <thead>
        <tr>
            <th >栏目名称</th>
            <th >ID</th>
            <th >排序</th>
            <th >创建时间</th>
            <th >更新时间</th>
            <th >操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cates as $one) :?>
            <tr>
                <td class="col-sm-4">
                    <span class="glyphicon glyphicon-plus"></span>
                    <a href="<?= Url::to(['category/index', 'CategorySearch[parentid]' => $one['id']]); ?>"><?= $one['name'];?></a>
                </td>
                <td class="col-sm-2"><?= $one['id'] ?></td>
                <td><?= $one['listorder'] ?></td>
                <td><?= date('Y-m-d H:i:s', $one['created_at']) ?></td>
                <td><?= date('Y-m-d H:i:s', $one['updated_at']) ?></td>
                <td>
                    <a title="更新栏目" href="<?= Url::to(['category/update','id'=>$one['id']])?>"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a title="添加子栏目" href="<?= Url::to(['category/create','pid'=>$one['id']])?>"><span class="glyphicon glyphicon-plus"></span></a>
                    <a title="删除栏目" class="cate-del" data-haschild="<?= $one['has_child'] ?>" data-method="post" href="<?= Url::to(['category/delete','id'=>$one['id']])?>"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

</div>

<?php
$pageJs = <<<EOF

    $('.cate-del').on('click', function(e) {
        var hasChild = $(this).attr('data-haschild');
        if (hasChild=='1') {
            alert('请先删除此栏目的子栏目');
            return false;
        }
        if (confirm('确认要删除此栏目？')) {
            return true;
        }
        return false;
    });
EOF;
$this->registerJs($pageJs);

?>
