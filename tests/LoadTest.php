<?php
/**
 * @author ykmship@yandex-team.ru
 * Date: 03/11/14
 */

namespace Kozz\Tests;


use Kozz\Yii1\Cache\YiiDoctrineCache;
use PHPUnit_Framework_TestCase;

class LoadTest extends PHPUnit_Framework_TestCase
{
  public function testLoad()
  {
    $this->assertTrue(class_exists('Kozz\Yii1\Cache\YiiDoctrineCache'));
  }

  public function testYiiCache()
  {
    $this->assertInstanceOf('CDummyCache', \Yii::app()->cache);
  }
}