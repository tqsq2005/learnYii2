<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PopulacMapUser */

$this->title = Yii::t('app', '新增用户');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '用户管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs("$('#populacmapuser-mapuser').on('keyup', function() {
    if($(this).val()) {
        $('#populacmapuser-nickname').val($(this).val());
    }
});");
?>
<div class="populac-map-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<script type="text/javascript">
    /*$(function() {
        $('#populacmapuser-mapuser').on('blur', function(event) {
            if($(this).val()) {
                $('#populacmapuser-nickname').val() = $(this).val();
            }
        });
    });*/

</script>