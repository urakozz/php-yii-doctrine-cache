<?php
/**
 * @author ykmship@yandex-team.ru
 * Date: 16/10/14
 */

namespace Kozz\Yii1\Cache;


use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\MemcacheCache;
use Doctrine\Common\Cache\MemcachedCache;

/**
 * Class YiiDoctrineCache
 *
 * @pattern Proxy, Factory
 *
 * @package Yii1\Cache
 */
final class YiiDoctrineCache implements Cache
{

  /**
   * @var Cache
   */
  protected static $provider;

  /**
   * @return \Kozz\Yii1\Cache\YiiDoctrineCache
   */
  public function __construct()
  {
    $this->initCache();
  }


  /**
   * Fetches an entry from the cache.
   *
   * @param string $id The id of the cache entry to fetch.
   *
   * @return mixed The cached data or FALSE, if no cache entry exists for the given id.
   */
  public function fetch($id)
  {
    return $this->getCache()->fetch($id);
  }

  /**
   * Tests if an entry exists in the cache.
   *
   * @param string $id The cache id of the entry to check for.
   *
   * @return boolean TRUE if a cache entry exists for the given cache id, FALSE otherwise.
   */
  public function contains($id)
  {
    return $this->getCache()->contains($id);
  }

  /**
   * Puts data into the cache.
   *
   * @param string $id       The cache id.
   * @param mixed  $data     The cache entry/data.
   * @param int    $lifeTime The cache lifetime.
   *                         If != 0, sets a specific lifetime for this cache entry (0 => infinite lifeTime).
   *
   * @return boolean TRUE if the entry was successfully stored in the cache, FALSE otherwise.
   */
  public function save($id, $data, $lifeTime = 0)
  {
    return $this->getCache()->save($id, $data, $lifeTime);
  }

  /**
   * Deletes a cache entry.
   *
   * @param string $id The cache id.
   *
   * @return boolean TRUE if the cache entry was successfully deleted, FALSE otherwise.
   */
  public function delete($id)
  {
    return $this->getCache()->delete($id);
  }

  /**
   * @return array|null An associative array with server's statistics if available, NULL otherwise.
   */
  public function getStats()
  {
    return $this->getCache()->getStats();
  }


  /**
   * Cache Initializer
   */
  protected function initCache()
  {
    if(!self::$provider instanceof Cache)
    {
      self::$provider = $this->getDoctrineCacheProvider();
    }
  }

  /**
   * @return Cache
   */
  protected function getCache()
  {
    return self::$provider;
  }

  protected function getDoctrineCacheProvider()
  {
    $yiiCache = \Yii::app()->getComponent('cache');
    if($yiiCache instanceof \CMemCache && $yiiCache->useMemcached)
    {
      $cache = new MemcachedCache();
      $cache->setMemcached($yiiCache->getMemCache());
    }
    elseif($yiiCache instanceof \CMemCache && !$yiiCache->useMemcached)
    {
      $cache = new MemcacheCache();
      $cache->setMemcache($yiiCache->getMemCache());
    }
    else
    {
      $cache = new ArrayCache();
    }
    return $cache;
  }
}
