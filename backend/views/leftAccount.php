<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 13:56
 */
use yii\helpers\Url;
?>
<div class="list-group">
    <a href="#" class="list-group-item" data-toggle="collapse"  data-target="#adminlist">
        管理员管理 <span class="caret"></span>
    </a>
    <div id="adminlist" class="collapse in">
        <a href="<?= Url::toRoute('admin/index');?>" class="list-group-item">管理员管理</a>
        <a href="<?= Url::toRoute('admin/add');?>" class="list-group-item">添加管理员</a>
    </div>
</div>

<div class="list-group">
    <a href="#" class="list-group-item" data-toggle="collapse"  data-target="#accountlist">
        用户管理 <span class="caret"></span>
    </a>
    <div id="accountlist" class="collapse in">
        <a href="<?= Url::toRoute('account/index');?>" class="list-group-item">用户管理</a>
        <a href="<?= Url::toRoute('account/add');?>" class="list-group-item">添加用户</a>
    </div>
</div>