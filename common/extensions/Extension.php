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

    public static function dump()
    {
        $args = func_get_args();
        foreach($args as $key => $value) {
            echo '<pre>';
            var_dump($value);
            echo '</pre>';
        }
    }



}