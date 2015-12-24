<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PopulacPreferences */

$this->title = Yii::t('app', '新增项目');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '常用项目配置'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="populac-preferences-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
