<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->params['appname'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => '用户管理', 'url' => ['/map-user/index']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::$app->params['unitname'] ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<div class="btn-group-vertical" role="group" aria-label="侧边辅助按钮组" id="floatButton">
    <button type="button" class="btn btn-default" role="button" aria-label="去顶部" id="goTop" title="去顶部"><span
            class="glyphicon glyphicon-arrow-up"></span></button>
    <button type="button" class="btn btn-default" role="button" aria-label="刷新" id="refresh" title="刷新"><span
            class="glyphicon glyphicon-repeat"></span></button>
    <button type="button" class="btn btn-default" role="button" aria-label="本页二维码" id="pageQrcode" title="本页二维码"><span
            class="glyphicon glyphicon-qrcode"></span>
        <img class="qrcode" width="130" height="130" src="<?= \yii\helpers\Url::to(['/site/qrcode', 'url' => Yii::$app->request->absoluteUrl])?>" />
    </button>
    <button type="button" class="btn btn-default" role="button" aria-label="去底部" id="goBottom" title="去底部"><span
            class="glyphicon glyphicon-arrow-down"></span></button>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
