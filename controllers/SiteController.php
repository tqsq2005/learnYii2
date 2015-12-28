<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\log\DbTarget;
use yii\validators\DateValidator;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\common\globalFunc\Func;
use app\common\components\ActionTimeFilter;
use yii\helpers\Url;
use yii\web\Request;
use yii\web\Response;
use dosamigos\qrcode\QrCode;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            'actionTimeFilter' => [
                'class' => ActionTimeFilter::className(),
                'only'  => ['about'],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'minLength' => 2,//验证码最小长度
                'maxLength' => 4,//验证码最大长度
                'fontFile' => '@yii/captcha/BOTTF.TTF',//验证码字体库
                'offset' => 2,//验证码字符间距
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionQrcode($url = '')
    {
        return QrCode::png($url);
    }

    public function actionTest()
    {
        echo "<pre>";
        //Yii::$app->formatter->dateFormat = "php:Y-m-d";
        Func::print_br(Yii::$app->formatter->dateFormat);

        $validate = new DateValidator();
        $testVal = '2015.02.28';
        if($validate->validate($testVal, $error))
        {
            echo "$testVal 是有效日期！";
            echo Yii::$app->formatter->asDatetime(date('Y-m-d'));
        } else {
            Func::print_br($error);
        }
        /*$arr  = ['name', 'email'];
        $arr1 = [['name', 'email'], 'string', 'max'=>123];
        $arr2 = [['email'], 'email'];
        $result = compact('name', 'email', [[['name', 'email'], 'string', 'max'=>123], [['email'], 'email']]);
        VarDumper::dump($result);*/

        echo "</pre>";



    }

    public function actionEvent()
    {
        Func::print_br('---------演示‘事件处理’-----------');
        $this->on('sayHello', function($event) {
            Func::print_br($event->data);
        }, 'Hello my friend!'.time());
        $this->trigger('sayHello');
    }
    /**
     * (object) actionZhmax :
     * @return object
     * @throws \yii\base\InvalidConfigException
     */
    public function actionZhmax()
    {
        return Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => Response::FORMAT_JSON,
            'data' => [
                'name' => 'zhmax.com',
                'addr' => '越秀区童心路17#301',
                'tel' => '020-83580248',
            ],
            //if not set, use yii\web\Application::$charset.
            'charset' => 'utf-8',
        ]);
    }

    public function actionMail()
    {
        $mail = \Yii::$app->mailer->compose()
            ->setTo('1154579648@qq.com')
            ->setFrom(['tqsq2005@163.com' => 'Yii 中文网'])
            ->setSubject('邮件发送配置')
            //->setTextBody('Yii中文网教程真好 www.yii-china.com')   //发布纯文字文本
            ->setHtmlBody("<br>Yii中文网教程真好！www.yii-china.com")    //发布可以带html标签的文本
            ->send();
        if($mail)
            echo 'success';
        else
            echo 'fail';
    }
}
