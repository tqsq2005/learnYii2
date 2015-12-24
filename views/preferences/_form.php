<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PopulacPreferences */
/* @var $form yii\widgets\ActiveForm */
?>
<!--<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Warning!</strong> <?/* {error} */?>
</div>-->
<div class="populac-preferences-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data','class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "<div class='form-group form-group-lg'>{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-5\">{error}</div></div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
            //'placeholder' => "{attribute}",
        ],
    ]); ?>

    <?= $form->field($model, 'codes')->textInput(['maxlength' => true, 'placeholder' => '请输入参数编码，如01,02,03...']) ?>

    <?= $form->field($model, 'name1')->textInput(['maxlength' => true, 'placeholder' => '请输入参数名称']) ?>

    <?= $form->field($model, 'changemark')->dropDownList($model->getChangemark()) ?>

    <?= $form->field($model, 'classmark')->textInput(['maxlength' => true, 'placeholder' => '请输入英文名称的项目分类']) ?>

    <?= $form->field($model, 'classmarkcn')->textInput(['maxlength' => true, 'placeholder' => '请输入中文名称的项目分类']) ?>

    <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::className(), [
        'template' => "<div style='float: left; width: 60%'>{input}</div>\n<div style='float: left; width: 40%'>{image}</div>",
        'imageOptions' => ['alt' => '验证码'],
    ]) ?>
<span style="width: 60%"></span>
    <div class="form-group">
        <?php if($model->isNewRecord) { ?>
            <?= Html::resetButton(Yii::t('app', '取消'), ['class' => 'col-lg-2 col-lg-offset-2 btn btn-lg btn-warning']) ?>
        <?php } ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '保存') : Yii::t('app', '更新'), ['class' => $model->isNewRecord ? 'col-lg-2 col-lg-offset-1 btn btn-lg btn-success' : 'col-lg-2 col-lg-offset-5 btn btn-lg btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
