<?php
 /**
  * ActionTimeFilter.php
  * ==============================================
  * 版权所有 2001-2015 http://www.zhmax.com
  * ----------------------------------------------
  * 这不是一个自由软件，未经授权不许任何使用和传播。
  * ----------------------------------------------
  * @date: 15-12-3
  * @author: LocoRoco<tqsq2005@gmail.com>
  * @version:v2015
  * @since:Yii2
  * ----------------------------------------------
  * 程序文件简介：记录动作执行时间日志的过滤器
  * ==============================================
  */

namespace app\common\components;

use Yii;
use yii\base\ActionFilter;

/**
 * Class ActionTimeFilter :
 * @package app\common\components
 * @author: LocoRoco<tqsq2005@gmail.com>
 * @since:Yii2
 */
class ActionTimeFilter extends ActionFilter {
    /**
     * @var 存储unix时间戳
     */
    private $_startTime;

    /**
     * (mixed) beforeAction : 记录动作执行之前的unix时间戳
     * @param $action
     * @return mixed
     */
    public function beforeAction($action) {
        $this->_startTime = microtime(true);
        return parent::beforeAction($action);
    }

    /**
     * (mixed) afterAction : 输出追踪 动作执行花费时间 信息
     * @param \yii\base\Action $action
     * @return mixed
     */
    public function afterAction($action, $result) {
        $time = microtime(true) - $this->_startTime;
        Yii::trace("Action '{$action->uniqueID}' spent {$time} second.");
        return parent::afterAction($action, $result);
    }
}