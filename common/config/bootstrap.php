<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

require_once(dirname(__DIR__) . '/common_functions.php');
$domain = GetUrlToDomain($_SERVER['HTTP_HOST']);
define('DOMAIN', $domain);
