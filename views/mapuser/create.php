<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PopulacMapuser */

$this->title = Yii::t('app', '新增账号');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '账号管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs("$('#populacmapuser-mapuser').on('keyup', function() {
    if($(this).val()) {
        $('#populacmapuser-nickname').val($(this).val());
    }
});");
?>
<div class="populac-mapuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
