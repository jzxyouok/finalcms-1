<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 11:26
 */


use yii\helpers\Url;
?>
<div class="list-group">
    <a href="#" class="list-group-item" data-toggle="collapse"  data-target="#mylist">
        个人信息 <span class="caret"></span>
    </a>
    <div id="mylist" class="collapse in">
        <a href="#" class="list-group-item">修改密码</a>
    </div>
</div>
<div class="list-group">
    <a href="#" class="list-group-item" data-toggle="collapse"  data-target="#commonlist">
        常用操作 <span class="caret"></span>
    </a>
    <div id="commonlist" class="collapse in">
        <a href="<?= Url::toRoute('category/index');?>" class="list-group-item">栏目管理</a>
        <a href="<?= Url::toRoute('content/index');?>" class="list-group-item">内容管理</a>
    </div>
</div>
