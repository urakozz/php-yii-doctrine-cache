Yii1 Doctrine Cache
======================

[![Build Status](https://travis-ci.org/urakozz/php-yii-doctrine-cache.svg?branch=master)](https://travis-ci.org/urakozz/php-yii-doctrine-cache)
[![Coverage Status](https://coveralls.io/repos/urakozz/php-yii-doctrine-cache/badge.png)](https://coveralls.io/r/urakozz/php-yii-doctrine-cache)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/urakozz/php-yii-doctrine-cache/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/urakozz/php-yii-doctrine-cache/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/kozz/yii-doctrine-cache/v/stable.svg)](https://packagist.org/packages/kozz/yii-doctrine-cache)
[![Latest Unstable Version](https://poser.pugx.org/kozz/yii-doctrine-cache/v/unstable.svg)](https://packagist.org/packages/kozz/yii-doctrine-cache)
[![License](http://img.shields.io/packagist/l/kozz/yii-doctrine-cache.svg)](https://packagist.org/packages/kozz/yii-doctrine-cache)

Proxy for Doctrine Cache in Yii

### When to use

```YiiDoctrineCache``` implements ```Doctrine\Common\Cache\Cache``` interface 
so it's fully compatible with all libraries that are requiring Doctrine Cache such as:

- Doctrine Annotation Reader
- Symfony Validator
- JMS Serializer

### How does it works

```YiiDoctrineCache``` loads the most suitable Doctrine Cache Implementation 
in dependency of Yii Cache configuration:

- ```Doctrine\Common\Cache\MemcachedCache```
- ```Doctrine\Common\Cache\MemcacheCache```
- ```Doctrine\Common\Cache\ArrayCache```

### Advantages

```YiiDoctrineCache``` uses Proxy design pattern under the hood 
so you always have the same instance of Cache every time you call ```new YiiDoctrineCache()``` 
even if Doctrine's ```ArrayCache``` selected

```php

//SomeFile.php
use Kozz\Yii1\Cache\YiiDoctrineCache;

$cache = new YiiDoctrineCache();
$cache->save('id', 'value');

//SomeOtherFile.php
use Kozz\Yii1\Cache\YiiDoctrineCache;

$cache = new YiiDoctrineCache();
$cache->fetch('id'); // 'value'


```

### Reference

Methods

```fetch($id)``` - Fetches an entry from the cache

```contains($id)``` - Test if an entry exists in the cache

```save($id, $data, $lifeTime = false)``` - Puts data into the cache

```delete($id)``` - Deletes a cache entry

