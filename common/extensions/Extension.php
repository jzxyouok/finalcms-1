<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 16/8/12
 * Time: 下午1:47
 */
namespace common\extensions;

class Extension
{

    public static function getParam($data, $param, $defaultValue = null)
    {
        return isset($data[$param]) ? $data[$param] : $defaultValue;
    }



}