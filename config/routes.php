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

    //Ĭ�ϵ�·�ɹ��򣬷������
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
];