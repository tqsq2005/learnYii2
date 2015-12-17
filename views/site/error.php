<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
<!--        The above error occurred while the Web server was processing your request.-->
        Web服务器处理您的请求时发生了以上错误！
    </p>
    <p>
<!--        Please contact us if you think this is a server error. Thank you.-->
        如果您觉得是服务器的问题，请及时和我们联系，谢谢！
    </p>

</div>
