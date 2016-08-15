<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 16/8/15
 * Time: 下午4:48
 */

use \yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;


include(Yii::getAlias('@backend/views/base.php'));

$this->title = '内容管理';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="user-index">


    <div class="clearfix" style="margin-bottom: 10px;"></div>

    <table class="table table-hover table-condensed table-bordered">
        <thead>
        <tr>
            <th >ID</th>
            <th >标题</th>
            <th >所属栏目</th>
            <th >创建时间</th>
            <th >更新时间</th>
            <th >操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $one) :?>
            <tr>
                <td ><?= $one['id'] ?></td>
                <td ><?= '标题' ?></td>
                <td class="col-sm-4">
                    <?= $one['cateid'];?>
                </td>
                <td><?= date('Y-m-d H:i:s', $one['created_at']) ?></td>
                <td><?= date('Y-m-d H:i:s', $one['updated_at']) ?></td>
                <td>
                    <a title="更新文章" href="<?= Url::to(['content/update','id'=>$one['id']])?>"><span class="glyphicon glyphicon-pencil"></span></a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

</div>
