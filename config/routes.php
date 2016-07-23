<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 9:34
 */
return [

    'http://admin.' . DOMAIN => '/admin',
    'http://admin.'.DOMAIN.'/<controller:\w+>' => '/admin/<controller>',
    'http://admin.'.DOMAIN.'/<controller:\w+>/<action:[\w-]+>' => '/admin/<controller>/<action>',

    //默认的路由规则，放在最后
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
];