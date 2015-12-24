<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PreferencesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="populac-preferences-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codes') ?>

    <?= $form->field($model, 'name1') ?>

    <?= $form->field($model, 'changemark') ?>

    <?= $form->field($model, 'classmark') ?>

    <?= $form->field($model, 'id') ?>

    <?php // echo $form->field($model, 'classmarkcn') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
