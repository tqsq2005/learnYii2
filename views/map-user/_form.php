<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\base\Security;

/* @var $this yii\web\View */
/* @var $model app\models\PopulacMapUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="populac-map-user-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data','class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>


    <?= $form->field($model, 'mapuser')->textInput(['maxlength' => true])->hint('请输入用户名') ?>
    <?= $form->field($model, 'pass')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'verifyPass')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true])->hint('请输入用户昵称') ?>

    <?= $form->field($model, 'rights')->dropDownList($model->getRights(), [
        'prompt' => '--请选择权限--',
    ]) ?>

    <?= $form->field($model, 'upmapuser')->textInput(['maxlength' => true])->hint('请输入登录名数字编号')->label('数字ID') ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true, 'value' => (new Security())->generateRandomString()]) ?>

    <?= $form->field($model, 'access_token')->textInput(['maxlength' => true, 'value' => (new Security())->generateRandomString()]) ?>

    <?= $form->field($model, 'created_time')->textInput(['value' => strtotime('now'), 'readOnly' => true]) ?>

    <?= $form->field($model, 'updated_time')->textInput(['value' => strtotime('now'), 'readOnly' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatus(), [
        'prompt' => '--请选择状态--',
    ]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '保存') : Yii::t('app', '更新'), ['class' => $model->isNewRecord ? 'col-lg-2 col-lg-offset-5 btn btn-lg btn-success' : 'col-lg-2 col-lg-offset-5 btn btn-lg btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
