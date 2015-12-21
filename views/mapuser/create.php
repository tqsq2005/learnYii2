<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PopulacMapuser */

$this->title = Yii::t('app', 'Create Populac Mapuser');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Populac Mapusers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="populac-mapuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
