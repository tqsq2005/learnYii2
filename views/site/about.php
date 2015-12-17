<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\jui\DatePicker;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
/**
\Yii::$app->view->on(\yii\web\View::EVENT_END_BODY, function() {
    echo date('Y-m-d h:i:s');
});
**/
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
    <code><?php echo(__DIR__); ?></code>
    <code><?= \Yii::info('广州市越秀区童心路17#301'); ?></code>
    <div>
        <?= $this->context->id ?>
    </div>

    <div id="datePicker">
        <?= time() ?>
        <?= DatePicker::widget([
            'name' => 'myDatePicker',
            'id' =>'datePicker1',
            'language' => 'zh-CN',
            'dateFormat' => 'php:Ymd',
            'options' => [
                'title' => '请选择日期',
                'readonly' => true,
                //'disabled' => true,
                //'onChange' => 'alert($(this).val());',
            ],
            'clientOptions' => [
                //'dateFormat' => 'yy-mm-dd', // 无效
                'showAnim' => 'show',
                //'showButtonPanel' => true,
            ],
        ])?>
    </div>
    <div id="datePicker2">
        <?php
        echo DatePicker::widget([
            'language' => 'zh-CN',
            'name'  => 'country',
            'clientOptions' => [
                'dateFormat' => 'yy-mm-dd',
            ],
        ]);
        ?>
    </div>
    <div id="yii2chinaicon">
        <?= \yiichina\icons\Icon::show('user'); ?>
        <?= \yiichina\icons\Icon::show('user', 'fa') ?>
        <?= \yiichina\icons\Icon::show('spinner spin', 'fa') ?>
        <?= \yiichina\icons\Icon::show(['spinner', 'spin'], 'fa') ?>
    </div>

</div>
