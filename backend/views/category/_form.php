<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="well">

    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'id' => 'category-form',
        'layout' => 'horizontal',
        'enableAjaxValidation' => true,
        'validationUrl' => \yii\helpers\Url::toRoute(['validate-form']),
        'enableClientValidation' => false,
        'validateOnChange' => false,
        'validateOnBlur' => false,
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{endWrapper}\n{error}\n{hint}",
            'inlineRadioListTemplate' => "{label}\n{beginWrapper}\n{input}\n{endWrapper}\n{error}\n{hint}",
        ],

    ]); ?>

    <?= $form->errorSummary($model,['class' => 'alert alert-danger', 'role' => 'alert']);?>

    <ul class="nav nav-tabs" id="info-tab">
        <li class="active"><a href="#base-info" data-toggle="tab">基本选项</a></li>
        <li ><a href="#advanced-info" data-toggle="tab">高级选项</a></li>
    </ul>

    <p style="margin: 20px;"></p>

    <div class="tab-content">

        <?= $form->field($model,'parentid',['template' => '{input}'])->hiddenInput();?>

        <div id="base-info" class="tab-pane active">
            <div class="form-group field-categoryform-parentname">
                <label class="control-label col-sm-2" for="categoryform-parentname">父栏目名称</label>
                <div class="col-sm-3">
                    <input disabled type="text" value="<?= \common\services\Category::cateName($model->parentid)?>" id="categoryform-parentname" class="form-control" name="categoryform[parentname]">
                </div>
            </div>
            <?= $form->field($model,'modelid',[
                'labelOptions'=>['class'=>'control-label col-sm-2'],
                'wrapperOptions' => ['class'=>'col-sm-2'],
            ])->dropDownList(\common\services\Model::idIndexName());?>
            <?= $form->field($model,'name',[
                'labelOptions'=>['class'=>'control-label col-sm-2'],
                'wrapperOptions' => ['class'=>'col-sm-3'],
            ])->textInput();?>
            <?= $form->field($model,'listorder',[
                'labelOptions'=>['class'=>'control-label col-sm-2'],
                'wrapperOptions' => ['class'=>'col-sm-2'],
            ])->textInput();?>
            <?= $form->field($model,'urlpath',[
                'labelOptions'=>['class'=>'control-label col-sm-2'],
                'wrapperOptions' => ['class'=>'col-sm-3'],
            ])->textInput();?>
            <?= $form->field($model,'type',[
                'labelOptions'=>['class'=>'control-label col-sm-2'],
                'wrapperOptions' => ['class'=>'col-sm-6'],
            ])->radioList(\common\models\Category::$types);?>
        </div>
        <div id="advanced-info" class="tab-pane">


            <?= $form->field($model,'template_index',[
                'labelOptions'=>['class'=>'control-label col-sm-2'],
                'wrapperOptions' => ['class'=>'col-sm-3'],
            ])->textInput();?>

            <?= $form->field($model,'template_list',[
                'labelOptions'=>['class'=>'control-label col-sm-2'],
                'wrapperOptions' => ['class'=>'col-sm-3'],
            ])->textInput();?>

            <?= $form->field($model,'template_article',[
                'labelOptions'=>['class'=>'control-label col-sm-2'],
                'wrapperOptions' => ['class'=>'col-sm-3'],
            ])->textInput();?>

            <?= $form->field($model,'meta_title',[
                'labelOptions'=>['class'=>'control-label col-sm-2'],
                'wrapperOptions' => ['class'=>'col-sm-3'],
            ])->textInput();?>

            <?= $form->field($model,'meta_keywords',[
                'labelOptions'=>['class'=>'control-label col-sm-2'],
                'wrapperOptions' => ['class'=>'col-sm-3'],
            ])->textInput();?>

            <?= $form->field($model,'meta_description',[
                'labelOptions'=>['class'=>'control-label col-sm-2'],
                'wrapperOptions' => ['class'=>'col-sm-3'],
            ])->textInput();?>

        </div>

    </div>
    <div class="form-group">
        <div class="col-sm-2">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'category-button','style'=>'float:right;']) ?>
        </div>
    </div>
    <?php \yii\bootstrap\ActiveForm::end(); ?>

</div>
