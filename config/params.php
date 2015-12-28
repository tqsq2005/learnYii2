<?php

$params = [
    //'adminEmail' => 'admin@example.com',
    'adminEmail' => 'tqsq2005@163.com',
    //应用名称
    'appname' => '计划生育管理信息系统V' . date('Y'),
    //单位名称
    'unitname' => '珠海玛克科技有限公司',
    //打印的每页记录数
    'i_print_pagenum' => 20,
    //icon
    'icon-framework' => 'fa',
];
return \yii\helpers\ArrayHelper::merge(
    $params,
    file_exists(__DIR__ . '/params-local.php') ? require(__DIR__ . '/params-local.php') : []
);
