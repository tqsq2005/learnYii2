<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-11-26
 * Time: 下午3:51
 * 组件
 * 注册多个在其他地方使用的应用组件
 * 通过表达式 \Yii::$app->ComponentID 全局访问
 */
/*
 * 'log' => ['class' => 'yii\log\Dispatcher'],                  // 日志组件
        'view' => ['class' => 'yii\web\View'],                  // 视图组件
        'formatter' => ['class' => 'yii\i18n\Formatter'],       // 格式组件
        'i18n' => ['class' => 'yii\i18n\I18N'],                 // 国际化组件
        'mailer' => ['class' => 'yii\swiftmailer\Mailer'],      // 邮件组件
        'urlManager' => ['class' => 'yii\web\UrlManager'],      // url管理组件
        'assetManager' => ['class' => 'yii\web\AssetManager'],  // 前端资源管理组件
        'security' => ['class' => 'yii\base\Security'],         // 安全组件
 */
return [
    'request' => [
        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        'cookieValidationKey' => 'e3jOSU7FYFE6b8LymD1jp2gvr68mJiPE',
    ],
    //自定义错误响应格式
    /*
    'response' => [
        'class' => 'yii\web\Response',
        'on beforeSend' => function ($event) {
            $response = $event->sender;
            if ($response->statusCode !== 200) {
                $response->data = [
                    'success' => $response->isSuccessful,
                    'data' => $response->data,
                ];
                $response->statusCode = 200;
                $response->charset = 'utf-8';
                $response->format = \yii\web\Response::FORMAT_XML;
            }
        },
    ],
    */
    'cache' => [
        'class' => 'yii\caching\FileCache',
    ],
    //DbCache
    'dbcache' => [
        'class' => 'yii\caching\DbCache',
        //DbCache的表名
        'cacheTable' => 'populac_cache',
    ],
    'user' => [
        'identityClass' => 'app\models\User',
        'enableAutoLogin' => true,
        //'id' => 'zhmax.com',
    ],
    'errorHandler' => [
        'errorAction' => 'site/error',
    ],
    'mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        // send all mails to a file by default. You have to set
        // 'useFileTransport' to false and configure a transport
        // for the mailer to send real emails.
        'useFileTransport' => true,
    ],
    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        //How many messages should be logged before they are flushed from memory and sent to targets.
        // Defaults to 1000, meaning the flush() method will be invoked once every 1000 messages logged.
        // Set this property to be 0 if you don't want to flush messages until the application terminates.
        // This property mainly affects how much memory will be taken by the logged messages.
        // A smaller value means less memory, but will increase the execution time due to the overhead(日常开支) of flush().
        //注意：频繁的消息刷新和导出将降低你的应用性能。
        //'flushInterval' => 1,
        'targets' => [
            [
                'class' => 'yii\log\FileTarget',
                'levels' => ['error', 'warning'],
            ],
            //在数据库表里存储日志消息。
            [
                'class' => 'yii\log\DbTarget',
                'levels' => ['error', 'warning'],
                //How many messages should be accumulated before they are exported. Defaults to 1000.
                // Note that messages will always be exported when the application terminates.
                // Set this property to be 0 if you don't want to export messages until the application terminates.
                //注意：频繁的消息刷新和导出将降低你的应用性能。
                //'exportInterval' => 1,

                //Whether to enable this log target. Defaults to true.
                //程序可以这样设置：Yii::$app->log->targets['db']->enabled = false; 来禁用
                //'targets' => ['db' => ['class'=>'yii\log\DbTarget']]
                'enabled' => true,
            ],
        ],
    ],
    'db' => require(__DIR__ . '/db.php'),

    //URLManager
    'urlManager' => [
        //路由美化
        'enablePrettyUrl' => true,
        //掩藏入口脚本 web文件夹必须有 .htaccess 文件
        'showScriptName' => false,
        //开启严格解析模式时， 所有请求必须匹配 $rules[] 所声明的至少一个路由规则。
        'enableStrictParsing' => false,
        //假后缀
        'suffix' => '.htm',
        //路由规则
        'rules' => [
            //最前面的rule优先级最高
            '<controller:\w+>s' => '<controller>/index',
            [
                'pattern' => 'aboutUs',
                'route' => 'site/about',
                'suffix' => '.js',
            ],
            [
                'pattern' => 'test',
                'route' => 'site/test',
                'suffix' => '',
            ],
            '<controller:\w+>/<id:\d+>' => '<controller>/view',
            '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        ],
    ],
    //格式组件 'formatter' => ['class' => 'yii\i18n\Formatter'],
    //http://www.yiiframework.com/doc-2.0/yii-i18n-formatter.html#$datetimeFormat-detail
    //http://www.yiichina.com/doc/guide/2.0/input-validation
    'formatter' => [
        'dateFormat' => 'php:Y.m.d',
        'datetimeFormat' => 'php:Y.m.d H:i:s',
        'timeFormat' => 'php:H:i:s',
        'decimalSeparator' => ',',
        'thousandSeparator' => ' ',
        //'currencyCode' => 'RMB',
    ],
];