<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PopulacPreferences */

$this->title = $model->classmarkcn . "({$model->name1})";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '常用项目配置'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="populac-preferences-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '该操作将删除项目[{$model->classmarkcn}]下的[{$model->name1}]，请谨慎操作，确定吗？'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'classmarkcn',
            'classmark',
            'codes',
            'name1',
            //'changemark',
            [
                'label' => '修改标识',
                'value' => $model->getChangemark()[$model->changemark],
            ]
        ],
    ]) ?>

</div>
