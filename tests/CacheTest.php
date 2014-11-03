<?php
/**
 * @author ykmship@yandex-team.ru
 * Date: 03/11/14
 */

namespace Kozz\Tests;


use Kozz\Yii1\Cache\YiiDoctrineCache;
use PHPUnit_Framework_TestCase;

class CacheTest extends PHPUnit_Framework_TestCase
{

  public function testInstance()
  {
    $cache = new YiiDoctrineCache();

    $r = new \ReflectionClass($cache);
    $p = $r->getProperty('provider');
    $p->setAccessible(true);

    $this->assertInstanceOf('Doctrine\Common\Cache\ArrayCache', $p->getValue(null));
  }

  public function testSet()
  {
    $cache = new YiiDoctrineCache();
    $cache->save('test', 'value');

    $this->assertTrue($cache->contains('test'));
    $this->assertEquals('value', $cache->fetch('test'));
  }

  public function testDelete()
  {
    $cache = new YiiDoctrineCache();
    $cache->save('test1', 'value1');
    $cache->save('test2', 'value2');
    $cache->delete('test1');

    $this->assertFalse($cache->contains('test1'));
    $this->assertTrue($cache->contains('test2'));

  }


} 