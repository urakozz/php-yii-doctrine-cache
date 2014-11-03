<?php
/**
 * @author ykmship@yandex-team.ru
 * Date: 03/11/14
 */

/**
 * Regular Code
 */
date_default_timezone_set("America/Los_Angeles");
require_once __DIR__ . '/../vendor/yiisoft/yii/framework/yii.php';
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Yii Hacks, Cycles and Spikes
 */
defined('YII_ENABLE_EXCEPTION_HANDLER') or define('YII_ENABLE_EXCEPTION_HANDLER',false);
defined('YII_ENABLE_ERROR_HANDLER') or define('YII_ENABLE_ERROR_HANDLER',false);
defined('YII_DEBUG') or define('YII_DEBUG',true);
$_SERVER['SCRIPT_NAME']='/'.basename(__FILE__);
$_SERVER['SCRIPT_FILENAME']=__FILE__;
require_once __DIR__ . '/../vendor/yiisoft/yii/tests/TestApplication.php';
Yii::$enableIncludePath = false;
$r = new \ReflectionClass('YiiBase');
$p = $r->getProperty('_includePaths');
$p->setAccessible(true);
$p->setValue(null, []);
new TestApplication(__DIR__."/yiiConfig.php");