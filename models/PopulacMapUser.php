<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%mapuser}}".
 *
 * @property string $mapuser
 * @property string $pass
 * @property string $nickname
 * @property integer $rights
 * @property string $upmapuser
 * @property integer $id
 * @property string $auth_key
 * @property string $access_token
 * @property integer $created_time
 * @property integer $updated_time
 * @property integer $status
 * @property string $email
 * @property string $tel
 */
class PopulacMapuser extends ActiveRecord
{
    //状态常量
    const STATUS_NORMAL = 1; //正常
    const STATUS_UNNORMAL = -1; //异常
    const STATUS_DISABLED = 0; //禁用
    //权限常量
    const RIGHTS_SUPERADMIN = 0; //超级管理员
    const RIGHTS_SYSADMIN = 1;//系统管理员
    const RIGHTS_SYSOPERATOR = 2;//系统操作员
    const RIGHTS_SYSQUERY = 3;//系统查询员
    const RIGHTS_RSQUERY = 4;//人事查询员
    const RIGHTS_EMPLOYEE = 5;//员工
    const RIGHTS_GUEST = -9;//游客
    //确认密码
    private $_verifyPass;
    public function behaviours()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    //当记录插入时，行为将当前时间戳[time()]赋值给 created_time 和 updated_time 属性；
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_time', 'updated_time'],
                    //当记录更新时，行为将当前时间戳[time()]赋值给 updated_time 属性。
                    ActiveRecord::EVENT_AFTER_UPDATE => ['updated_time'],
                ],
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mapuser}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mapuser', 'pass', 'upmapuser', 'nickname', 'email', 'tel', 'auth_key', 'access_token'], 'required'],
            [['rights', 'status'], 'integer'],
            //[['created_time', 'updated_time'], 'safe'],
            [['mapuser', 'pass', 'upmapuser', 'nickname', 'email', 'tel', 'auth_key', 'access_token'], 'string', 'max' => 50],
            [['tel'], 'match','pattern'=>'/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/','message'=>'请输入正确的{attribute}.'],
            //限制用户最小长度和最大长度
            [['mapuser', 'nickname'], 'string', 'max'=>20, 'min'=>2, 'tooLong'=>'{attribute}请输入长度为2-20个字符', 'tooShort'=>'{attribute}请输入长度为2-20个字符'],
            //正则验证器：
            //['mapuser','match','pattern'=>'/^[a-z0-9\-_]+$/'],
            //限制密码最小长度和最大长度
            [['pass', 'verifyPass'], 'string', 'max'=>30, 'min'=>6, 'tooLong'=>'{attribute}请输入长度为6-30位字符', 'tooShort'=>'{attribute}请输入长度为6-30位字符'],
            //检查用户输入的密码是否是一样的
            [['verifyPass'], 'compare', 'compareAttribute'=>'pass', 'message'=>'{attribute}与密码不一致'],
            //权限取值范围
            [['rights'], 'in', 'range'=>[self::RIGHTS_SUPERADMIN, self::RIGHTS_SYSADMIN, self::RIGHTS_SYSOPERATOR, self::RIGHTS_SYSQUERY, self::RIGHTS_RSQUERY, self::RIGHTS_EMPLOYEE, self::RIGHTS_GUEST]],
            //状态取值范围
            [['status'], 'in', 'range'=>[self::STATUS_NORMAL, self::STATUS_UNNORMAL, self::STATUS_DISABLED]],
            //判断用户输入的是否是邮件
            [['email'], 'email', 'message'=>'{attribute}格式不正确！邮箱格式参考如： example@zhmax.com' ],
            //检查用户名是否重复
            [['mapuser'],'unique','message'=>'{attribute}已存在'],
            //检查注册邮箱是否重复
            [['email'],'unique','message'=>'{attribute}已被注册'],
            //检查注册手机是否重复
            [['tel'],'unique','message'=>'{attribute}已被注册'],

        ];
    }

    /**
     * (void) scenarios :

    public function scenarios()
    {
        $parent = parent::scenarios();
        $parent['create'] = ['mapuser', 'pass', 'upmapuser', 'nickname', 'email', 'tel', ''];

    }*/

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mapuser' => Yii::t('app', '登录账号'),
            'pass' => Yii::t('app', '登录密码'),
            'rights' => Yii::t('app', '权限级别'),
            'upmapuser' => Yii::t('app', '数字ID'),
            'id' => Yii::t('app', '自增ID'),
            'nickname' => Yii::t('app', '昵称'),
            'email' => Yii::t('app', '联系邮箱'),
            'tel' => Yii::t('app', '手机号码'),
            'status' => Yii::t('app', '账号状态'),
            'auth_key' => Yii::t('app', 'auth_key'),
            'access_token' => Yii::t('app', 'access_token'),
            'created_time' => Yii::t('app', '创建时间'),
            'updated_time' => Yii::t('app', '更新时间'),
            //不在populac_mapUser表中的信息段
            'verifyPass' => Yii::t('app', '确认密码'),
        ];
    }

    /**
     * 为了在使用dropdown输入框的时候使用
     * @return int
     */
    public function getStatus()
    {
        //return $this->status;
        return [
            self::STATUS_NORMAL => '正常',
            self::STATUS_UNNORMAL => '异常',
            self::STATUS_DISABLED => '禁用',
        ];
    }

    /**
     * 为了在使用dropdown输入框的时候使用
     * @return int
     */
    public function getRights()
    {
        return [
            self::RIGHTS_SUPERADMIN => '超级管理员',
            self::RIGHTS_SYSADMIN => '系统管理员',
            self::RIGHTS_SYSOPERATOR => '系统操作员',
            self::RIGHTS_RSQUERY => '系统查询员',
            self::RIGHTS_RSQUERY => '人事查询员',
            self::RIGHTS_EMPLOYEE => '员工',
            self::RIGHTS_GUEST => '游客',
        ];
    }

    /**
     * @return mixed
     */
    public function getVerifyPass()
    {
        return $this->_verifyPass;
    }

    /**
     * @param mixed $verifyPass
     */
    public function setVerifyPass($verifyPass)
    {
        $this->_verifyPass = $verifyPass;
    }

    /**
     * (string) getUpmapuser :
     * @return string
     */
    public function getUpmapuser()
    {
        if($this->isNewRecord)
        {
            $upmapuser = $this::find()->select('id')->orderBy(['id' => 'desc'])->limit(1)->one();
            return str_pad($upmapuser->id + 1, 12, '0', STR_PAD_LEFT);
        } else
        {
            return $this->upmapuser;
        }

    }
}
