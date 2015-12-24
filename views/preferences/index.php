<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PreferencesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '常用项目配置');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="populac-preferences-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '新增项目'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            // 'changemark',
            'classmark',
            'classmarkcn',
            'codes',
            'name1',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
