<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\log\DbTarget;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\common\globalFunc\Func;
use app\common\components\ActionTimeFilter;
use yii\helpers\Url;
use yii\web\Request;
use yii\web\Response;

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

    public function actionTest()
    {
        echo "<pre>";
        echo __DIR__ . PHP_EOL;
        echo dirname(__DIR__) . PHP_EOL;
        echo realpath(dirname(__DIR__)) . PHP_EOL;
        echo __FILE__ . PHP_EOL;
        echo realpath(__FILE__) . PHP_EOL;
        echo dirname(__FILE__) . PHP_EOL;
        echo '@app' . PHP_EOL;
        echo Yii::getAlias('@app') . PHP_EOL;
        echo \yii::getAlias('@app') . PHP_EOL;
        echo Yii::getAlias('@selfMail') .PHP_EOL;
        echo Yii::$app->params['i_print_pagenum'] . PHP_EOL;
        echo Yii::$app->layoutPath . PHP_EOL;
        Func::print_br(time());
        $microtime1 = microtime(true);
        Func::print_br($microtime1);
        usleep(1000000);
        Func::print_br(microtime());
        Func::print_br(microtime(true));
        Func::print_br(microtime(true) - $microtime1);
        $url = Url::to();
        Func::print_br($url);
        $url = Url::to(['site/about']);
        Func::print_br($url);
        Func::print_br(Url::base());
        Func::print_br(Url::base(true));
        Func::print_br(Url::home());
        Func::print_br(Url::home(true));
        Func::print_br('1');
        Func::print_br(Url::current());
        Func::print_br('2');
        Func::print_br(Url::canonical());
        Func::print_br('3');
        Url::remember();
        Func::print_br(Url::previous());
        $request = Yii::$app->request;
        Func::print_br('-------print_request_info-------');
        /*Func::print_br($request->userAgent);
        Func::print_br($request->userHost);
        Func::print_br($request->userIP);
        //print_r(Yii::$app->request);

        $log = Yii::$app->getLog();
        //VarDumper::dump($log);
        foreach($log->targets as $target) {
            if($target instanceof DbTarget) {
                VarDumper::dump($target);
            }
        }

        VarDumper::dump(method_exists('app\common\Func', 'test'));
        VarDumper::dump(method_exists('app\common\Func', 'print_br'));
        VarDumper::dump(property_exists('app\common\Func', 'str1'));
        Func::print_br(URL::toRoute(['aboutUs']));
        Func::print_br(mb_substr(Yii::$app->params['unitname'], 2));
        Func::print_br(mb_substr('unitname', 2));
        Func::print_br(Func::subStr(Yii::$app->params['unitname'], 2));
        Func::print_br(Func::subStr('unitname', 2));
        Func::print_br(mb_substr(Yii::$app->params['unitname'], 0, 2, 'utf-8'));
        VarDumper::dump(mb_http_output());
        VarDumper::dump(mb_http_input());
        VarDumper::dump(mb_internal_encoding());
        VarDumper::dump(mb_get_info());*/
        //$user = new User();
        //print_r($user);
        //print_r(Yii::$app->user);
        //print_r($this);
        //print_r(Yii::$aliases);
        //print_r(Yii::$app);
        //print_r(Yii::$app->request);
        /*$container = new \yii\di\Container();
        $container->set('yii\db\Connection');
        $container->setSingleton('yii\mail\MailInterface', 'yii\swiftmailer\Mailer');
        $container->setSingleton('yii\db\Connection', [
            'dsn' => 'mysql:host=127.0.0.1;dbname=demo',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ]);
        VarDumper::dump($container);
        //false
        VarDumper::dump(is_object('yii\swiftmailer\Mailer'));
        VarDumper::dump(Yii::$app->getDb());
        VarDumper::dump(Yii::$app->db);*/
        $connection = Yii::$app->getDb();
        /*$column = $connection->quoteColumnName($column);
        $table = $connection->quoteTableName($table);
        $sql = "select count($column) from {{%$table}}";*/
        /*$sql = "select count(1) from `populac_log`";
        $command = $connection->createCommand($sql);
        $printSql = $command->sql;
        VarDumper::dump($printSql);
        $schema = $connection->getSchema();
        $tableNames = $schema->getTableNames();
        VarDumper::dump($tableNames);
        VarDumper::dump($schema);*/
        $query = new Query();
        $para = " 0 or 1=1";
        //$query->select(['id','level'])->from(['p'=>'populac_log'])->where(['like', 'category', $para]);
        $query->select(['id','level'])->from(['p'=>'populac_log'])->where('category=:para')->addParams([':para'=>$para])->orderBy(['id'=>SORT_ASC]);
        $sql = $query->createCommand()->rawSql;
        $rs = $query->all();
        VarDumper::dump($sql);
        VarDumper::dump($rs);
<<<<<<< HEAD
        //VarDumper::dump();
=======

>>>>>>> origin/master
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
}
