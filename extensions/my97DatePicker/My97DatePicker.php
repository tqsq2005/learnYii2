<?php
 /**
  * My97DatePicker.php
  * ==============================================
  * 版权所有 2001-2015 http://www.zhmax.com
  * ----------------------------------------------
  * 这不是一个自由软件，未经授权不许任何使用和传播。
  * ----------------------------------------------
  * @date: 15-12-5
  * @author: LocoRoco<tqsq2005@gmail.com>
  * @version:v2015
  * @since:Yii2
  * ----------------------------------------------
  * 程序文件简介：my97DatePicker 小部件
  * @link: http://www.yiiframework.com/extension/my97datepicker/
  * ==============================================
  */

namespace app\extensions\my97DatePicker;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class My97DatePicker : 小部件
 * @package app\extensions\my97DatePicker
 * @author: LocoRoco<tqsq2005@gmail.com>
 * @since:Yii2
 */
class My97DatePicker extends Widget
{
    /**
     * (void) init :
     */
    public function init()
    {
        parent::init();
    }

    public function run()
    {
//        $path=dirname(__FILE__).DIRECTORY_SEPARATOR.'source';
//        $baseUrl=Yii::app()->getAssetManager()->publish($path);
//        $cs=Yii::app()->getClientScript();
//        $cs->registerScriptFile($baseUrl.'/WdatePicker.js');
//
//        $options=CJavaScript::jsonEncode($this->options);
//        $this->htmlOptions['onclick']=strtr('WdatePicker({options});',array('{options}'=>$options));
//        if($this->hasModel())
//            echo CHtml::activeTextField($this->model,$this->attribute,$this->htmlOptions);
//        else
//        {
//            list($name,$id)=$this->resolveNameID();
//            echo CHtml::textField($name,$this->value,$this->htmlOptions);
//        }
    }
}