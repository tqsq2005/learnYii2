<?php
//定义全局常量
// comment out the following two lines when deployed to production
//测试环境配置，生产环境要配置成false 和 prod
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
//defined('YII_DEBUG') or define('YII_DEBUG', false);
//defined('YII_ENV') or define('YII_ENV', 'prod');

//注册composer自动加载器
require(__DIR__ . '/../vendor/autoload.php');
//包含Yii类文件
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

//加载应用配置
$config = require(__DIR__ . '/../config/web.php');

//创建、配置 并 运行应用
(new yii\web\Application($config))->run();
