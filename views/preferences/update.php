<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PopulacPreferences */

$this->title = Yii::t('app', '修改 {modelClass}: ', [
    'modelClass' => '项目分类',
]) . ' ' . $model->classmarkcn;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '常用项目配置'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="populac-preferences-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
