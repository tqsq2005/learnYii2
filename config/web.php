<?php

$params = require(__DIR__ . '/params.php');

$config = [
    //区分其他应用的唯一标识ID
    'id' => 'com.zhmax.populac',
    //应用的根目录
    //系统预定义 @app 代表这个路径
    'basePath' => dirname(__DIR__),
    // 将 log 组件 ID 加入引导让它始终载入  无论处理请求过程有没有访问到 log 组件
    'bootstrap' => ['log'],
    //语言
    'language' => 'zh-CN',
    //地区,该属性提供一种方式修改PHP运行环境中的默认时区，配置该属性本质上就是调用PHP函数 date_default_timezone_set()
    'timeZone' => 'Asia/Shanghai',
    //系统名称
    'name' => '机关企事业单位计划生育信息管理系统',
    //版本号
    'version' => 'V2015',
    //加载 自定义别名 aliases 该属性允许你用一个数组定义多个 别名。数组的key为别名名称，值为对应的路径
    //使用这个属性来定义别名，代替 Yii::setAlias() 方法来设置
    //别名一般定义在 config\bootstrap.php -见 深入理解Yii2
    'aliases' => require(__DIR__ . '/aliases.php'),
    /**
     * 组件
     * 注册多个在其他地方使用的应用组件
     * 通过表达式 \Yii::$app->ComponentID 全局访问
     */
    'components' => require(__DIR__ . '/components.php'),
    //该属性为一个数组，指定可以全局访问的参数，代替程序中硬编码的数字和字符，应用中的参数定义到一个单独的文件并随时可以访问是一个好习惯
    'params' => $params,
    //该属性仅 yii\web\Application 网页应用支持。 它指定一个要处理所有用户请求的 控制器方法，通常在维护模式下使用，同一个方法处理所有用户请求
    //该配置为一个数组，第一项指定动作的路由，剩下的数组项(key-value 成对)指定传递给动作的参数
//    'catchAll' => [
//        'debugging/test',
//        'param1' => 'zhmax',
//        'param2' => 'gzyx',
//    ],
    //该属性允许你指定一个控制器ID到任意控制器类
//    'controllerMap' => [
//        'debugging' => 'app\controllers\SiteController',
//    ],
    //该属性指定未配置的请求的响应 路由 规则，路由规则可能包含模块ID，控制器ID，动作ID
    //'defaultRoute' => 'map-user/index',
    'defaultRoute' => 'mapuser',
    //事件
    /*
    'on beforeRequest' => function($event) {
        echo '<pre>';
        //print_r($event);
        echo '应用开始响应...' . PHP_EOL;
        echo '</pre>';
    },
    'on afterRequest' => function($event) {
        echo '<pre>';

        echo '应用响应完毕' . PHP_EOL;
        //print_r($event);
        echo '</pre>';
    },
    'on beforeAction' => function($event) {
        echo '<pre>';
        //print_r($event);
        echo '操作开始响应...' . PHP_EOL;
        echo '</pre>';
    },
    'on afterAction' => function($event) {
        echo '<pre>';
        //print_r($event);
        echo '操作响应完毕' . PHP_EOL;
        echo '</pre>';
    },
    */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
