<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PopulacMapuser */

$this->title = $model->nickname . "[{$model->upmapuser}]";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '账号管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="populac-mapuser-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', "该操作将删除登录账号[{$model->nickname}]，请谨慎操作，确定吗？"),
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
            'email:email',
            'tel',
            //'status',
            [
                'label' => '账号状态',
                'value' => \app\common\globalFunc\Func::getPreferencesName1('sstatus', $model->status),
            ],
            'auth_key',
            'access_token',
            'created_time',
            'updated_time',
        ],
    ]) ?>

</div>
