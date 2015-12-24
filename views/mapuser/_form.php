<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\base\Security;

/* @var $this yii\web\View */
/* @var $model app\models\PopulacMapuser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="populac-map-user-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data','class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
            //'placeholder' => "{attribute}",
        ],
    ]); ?>


    <?= $form->field($model, 'mapuser')->textInput(['maxlength' => true, 'placeholder' => '请设置登录账号']) ?>
    <?= $form->field($model, 'pass')->passwordInput(['maxlength' => true, 'placeholder' => '请设置登录密码']) ?>
    <?= $form->field($model, 'verifyPass')->passwordInput(['maxlength' => true, 'placeholder' => '请重复登录密码']) ?>
    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true, 'placeholder' => '请设置账号昵称']) ?>

    <?= $form->field($model, 'rights')->dropDownList($model->getRights(), [
        'prompt' => '--请选择权限--',
    ]) ?>

    <?= $form->field($model, 'upmapuser')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => '请设置账号ID', 'value' => $model->getUpmapuser() ]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true, 'readonly' => true, 'value' => (new Security())->generateRandomString()]) ?>

    <?= $form->field($model, 'access_token')->textInput(['maxlength' => true, 'readonly' => true, 'value' => (new Security())->generateRandomString()]) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatus(), [
        'prompt' => '--请选择状态--',
    ]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => '请设置账号关联email，方便取回密码及获取通知']) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true, 'placeholder' => '请设置账号关联11位数手机号码，方便取回密码及获取通知']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '保存') : Yii::t('app', '更新'), ['class' => $model->isNewRecord ? 'col-lg-2 col-lg-offset-5 btn btn-lg btn-success' : 'col-lg-2 col-lg-offset-5 btn btn-lg btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
