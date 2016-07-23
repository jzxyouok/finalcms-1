<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 12:38
 */
use yii\helpers\Url;
?>
<div class="list-group">
    <a href="#" class="list-group-item" data-toggle="collapse"  data-target="#contentlist">
        内容管理 <span class="caret"></span>
    </a>
    <div id="contentlist" class="collapse in">
        <a href="<?= Url::toRoute('category/index');?>" class="list-group-item">栏目管理</a>
        <a href="<?= Url::toRoute('content/index');?>" class="list-group-item">内容管理</a>
    </div>
</div>