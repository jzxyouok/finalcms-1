<?php
use yii\helpers\Html;
use yii\helpers\Url;


include(Yii::getAlias('@backend/views/base.php'));

$this->title = '内容管理';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="category-index">

        <?php  echo $this->render('_search', ['model' => $searchModel, 'data' => $data]); ?>

        <div class="clearfix" style="margin-bottom: 10px;"></div>


        <table class="table table-hover table-condensed table-bordered">
            <thead>
            <tr>
                <th >ID</th>
                <th >栏目名称</th>
                <th >排序</th>
                <th >栏目类型</th>
                <th >创建时间</th>
                <th >更新时间</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cates as $one) :?>
                <tr>
                    <td ><?= $one['id'] ?></td>
                    <td class="col-sm-4">
                        <?php if ($one['level'] >= 2) :?>
                        <a href="<?= Url::to(['content/list', 'cid' => $one['id']]); ?>"><?= $one['cate_name'];?></a>
                        <?php else: ?>
                            <?= $one['cate_name'];?>
                        <?php endif; ?>
                    </td>
                    <td><?= $one['listorder'] ?></td>
                    <td><?= \common\services\Model::idIndexName()[$one['type']] ?></td>
                    <td><?= date('Y-m-d H:i:s', $one['created_at']) ?></td>
                    <td><?= date('Y-m-d H:i:s', $one['updated_at']) ?></td>
                    <td>
                        <?php if ($one['modelid'] == 0) :?>
                        <a title="更新单网页" href="<?= Url::to(['content/update','id' => $one['id']])?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        <?php endif; ?>
                        <a title="添加栏目内容" href="<?= Url::to(['content/create','pid' => $one['id']])?>"><span class="glyphicon glyphicon-plus"></span></a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>

    </div>