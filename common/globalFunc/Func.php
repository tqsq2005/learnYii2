<?php
 /**
  * Func.php
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
  * 程序文件简介：自定义公共函数集合类
  * ==============================================
  */

namespace app\common\globalFunc;

use Yii;
use yii\base\Object;

/**
 * Class Func : 自定义公共函数集合类
 * @package common\globalFunc;
 * @author: LocoRoco<tqsq2005@gmail.com>
 * @since:Yii2
 */
class Func extends Object
{
    private $str1;
    /**
     * (void) print_br : 打印字符串后自动换行
     * @static
     * @param $str
     */
    public static function print_br($str)
    {
        echo $str . PHP_EOL;
    }

    /**
     * (string|void) hideMiddle : 掩藏字符串，只显示首尾字符
     * ```php
     * hideMiddle('funson86') will return 'f***6'
     * ```
     * @static
     * @param $string
     * @return string|void
     */
    public static function hideMiddle($string)
    {
        $string = trim($string);
        if (!strlen($string)) {
            return ;
        }
        $first = mb_substr($string, 0, 1);
        $last = mb_substr($string, -1, 1);
        return $first . '***' . $last;
    }

    /**
     * (string) subStr : 中文截取，支持gb2312,gbk,utf-8,big5, 建议直接使用 mb_substr($str, $start, $length, $charset);
     * @static
     * @param $str 要截取的字串
     * @param int $length 截取长度
     * @param string $charset utf-8¦gb2312¦gbk¦big5 编码
     * @param int $start 截取起始位置
     * @param null $suffix 尾缀
     * @return string
     */
    public static function subStr($str, $length=-1, $charset="utf-8", $start=0, $suffix=null)
    {
        if($length<1)
        {
            return $str;
        }
        if($str==null||empty($str))
        {
            return '';
        }
        /*
        if (empty($charset))
        {
            $charset = 'utf-8';
        }
        */
        //string mb_substr ( string $str , int $start [, int $length = NULL [, string $encoding = mb_internal_encoding() ]] )
        //获取字符串的部分 从$str的$start开始截取$length长度
        if (function_exists('mb_substr'))
        {
            if (mb_strlen($str, $charset) <= $length)
                return $str;
            $slice = mb_substr($str, $start, $length, $charset);
        }
        else
        {
            $re['utf-8'] = "/[\x01-\x7f]¦[\xc2-\xdf][\x80-\xbf]¦[\xe0-\xef][\x80-\xbf]{2}¦[\xf0-\xff][\x80-\xbf]{3}/";
            $re['gb2312'] = "/[\x01-\x7f]¦[\xb0-\xf7][\xa0-\xfe]/";
            $re['gbk'] = "/[\x01-\x7f]¦[\x81-\xfe][\x40-\xfe]/";
            $re['big5'] = "/[\x01-\x7f]¦[\x81-\xfe]([\x40-\x7e]¦\xa1-\xfe])/";
            preg_match_all($re[$charset], $str, $match);
            if (count($match[0]) <= $length)
                return $str;
            $slice = join("", array_slice($match[0], $start, $length));
        }
        if ($suffix!=null&&!empty($suffix))
        {
            return $slice . $suffix;
        }
        return $slice;
    }

    /**
     * (bool) mkpath :
     * ```php
     * 判断文件夹是否存在，不存在即创建: mkpath($uploadDir);
     * ```
     * @static
     * @param $path
     * @return bool
     */
    public static function mkpath($path)
    {
        $dirs = array();
        $path = preg_replace('/(\/){2,}|(\\\){1,}/', '/', $path);
        $dirs = explode("/", $path);
        $path = "";
        foreach ($dirs as $element) {
            $path.=$element . "/";
            if (!is_dir($path)) {
                if (!mkdir($path, 0777)) {
                    return false;
                } else {
                    chmod($path, 0777);
                }
            }
        }
        return true;
    }
}