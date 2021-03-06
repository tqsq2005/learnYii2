<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PopulacMapuser */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Populac Mapuser',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '账号管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="populac-mapuser-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
