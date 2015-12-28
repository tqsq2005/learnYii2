<?php
/**
  * CountryValidator.php
  * ==============================================
  * 版权所有 2001-2015 http://www.zhmax.com
  * ----------------------------------------------
  * 这不是一个自由软件，未经授权不许任何使用和传播。
  * ----------------------------------------------
  * @date: 15-12-25
  * @author: LocoRoco<tqsq2005@gmail.com>
  * @version:v2015
  * @since:Yii2
  * ----------------------------------------------
  * 程序文件简介：
  * ==============================================
  */

namespace app\common\validator;


use yii\validators\Validator;

class CountryValidator extends Validator {
    /**
     * (void) validateAttributes :
     * @param \yii\base\Model $model
     * @param array|null $attributes
     * @inheritdoc
     */
    public function validateAttribute($model, $attribute)
    {
        if(!in_array($model->$attribute, ['CN', 'HK'])) {
            $this->addError($model, $attribute, '国家必须选择"CN"或"HK"!');
        }
    }
}