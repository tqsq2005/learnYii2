<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MapUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '用户管理');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="populac-map-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '新增用户'), ['create'], ['class' => 'btn btn-lg btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'nickname',
            'mapuser',
            //'pass',
            'rights',
            'upmapuser',
            //'auth_key',
            //'access_token',
            'created_time:datetime',
            'updated_time:datetime',
            'status',
            'email:email',
            'tel',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
