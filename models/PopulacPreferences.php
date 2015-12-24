<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%preferences}}".
 *
 * @property string $codes
 * @property string $name1
 * @property integer $changemark
 * @property string $classmark
 * @property integer $id
 * @property string $classmarkcn
 */
class PopulacPreferences extends \yii\db\ActiveRecord
{
    const PREFERENCES_EDIT   = 1; //已修改
    const PREFERENCES_UNEDIT = 0; //未修改

    public $verifyCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%preferences}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codes', 'name1', 'classmark', 'classmarkcn'], 'required'],
            [['changemark'], 'integer'],
            [['codes'], 'string', 'max' => 4],
            [['name1'], 'string', 'max' => 80],
            [['classmark'], 'string', 'max' => 10],
            [['classmarkcn'], 'string', 'max' => 50],
            [['verifyCode'], 'captcha']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codes' => Yii::t('app', '参数编码'),
            'name1' => Yii::t('app', '参数名称'),
            'changemark' => Yii::t('app', '修改标识'),
            'classmark' => Yii::t('app', '项目分类-英文'),
            'id' => Yii::t('app', '自增ID'),
            'classmarkcn' => Yii::t('app', '项目分类-中文'),
            'verifyCode' => Yii::t('app', '验证码'),
        ];
    }

    /**
     * @return int
     */
    public function getChangemark()
    {
        //return $this->changemark;
        return [
            self::PREFERENCES_EDIT   => '已修改',
            self::PREFERENCES_UNEDIT => '未修改',
        ];
    }

    /**
     * (mixed) getName1Text : 根据给定的项目分类的英文名称及其参数代码返回参数名称
     * @param $classmark 项目分类的英文名称
     * @param $codes 参数代码
     * @return mix 参数名称
     */
    public function getName1Text($classmark, $codes)
    {
        $query = self::find();
        $data  = $query->select('name1')->andFilterWhere([
            'classmark' => $classmark,
            'codes'     => $codes,
        ])->limit(1)->one();
        return $data->name1;
    }

}
