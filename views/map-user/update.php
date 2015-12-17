<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PopulacMapUser */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Populac Map User',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Populac Map Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="populac-map-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
