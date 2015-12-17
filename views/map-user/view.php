<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PopulacMapUser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Populac Map Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="populac-map-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'mapuser',
            'pass',
            'rights',
            'upmapuser',
            'id',
            'nickname',
            'auth_key',
            'access_token',
            'created_time:datetime',
            'updated_time:datetime',
            'status',
            'email:email',
            'tel',
        ],
    ]) ?>

</div>
