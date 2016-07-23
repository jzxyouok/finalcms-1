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
    <a href="#" class="list-group-item" data-toggle="collapse"  data-target="#contentlist">
        用户管理 <span class="caret"></span>
    </a>
    <div id="contentlist" class="collapse in">
        <a href="<?= Url::toRoute('account/index');?>" class="list-group-item">用户管理</a>
    </div>
</div>