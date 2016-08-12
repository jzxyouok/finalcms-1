<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 16/8/12
 * Time: 上午11:22
 */
namespace common\extensions;

class Article
{

    public static function info($artId)
    {

    }

    public static function photoList($artId)
    {

    }

    public static function getList($data)
    {
        $cateId = Extension::getParam($data, 'cateId');
        $offset = Extension::getParam($data, 'offset', 0);
        $limit = Extension::getParam($data, 'limit', 10);

    }

    public static function listWithPage($data)
    {
        $cateId = Extension::getParam($data, 'cateId');
        $pageSize = Extension::getParam($data, 'pageSize', 10);


    }

}