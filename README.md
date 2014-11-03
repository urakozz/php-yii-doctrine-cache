Yii1 Doctrine Cache
======================

[![Build Status](https://travis-ci.org/urakozz/php-yii-doctrine-cache.svg?branch=master)](https://travis-ci.org/urakozz/php-yii-doctrine-cache)
[![Coverage Status](https://coveralls.io/repos/urakozz/php-yii-doctrine-cache/badge.png)](https://coveralls.io/r/urakozz/php-yii-doctrine-cache)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/urakozz/php-yii-doctrine-cache/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/urakozz/php-yii-doctrine-cache/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/kozz/yii-doctrine-cache/v/stable.svg)](https://packagist.org/packages/kozz/yii-doctrine-cache)
[![Latest Unstable Version](https://poser.pugx.org/kozz/yii-doctrine-cache/v/unstable.svg)](https://packagist.org/packages/kozz/yii-doctrine-cache)
[![License](http://img.shields.io/packagist/l/kozz/yii-doctrine-cache.svg)](https://packagist.org/packages/kozz/yii-doctrine-cache)

Abstract Factory + Proxy for Doctrine Cache in Yii

YiiDoctrineCache implements ```Doctrine\Common\Cache\Cache``` interface 
so it's fully compatible with all libraries that are requiring Doctrine Cache such as:

- Doctrine Annotation Reader
- Symfony Validator
- JMS Serializer

In dependency of Yii Cache configuration loads the suitable Doctrine Cache Implementation:

- ```Doctrine\Common\Cache\MemcachedCache```
- ```Doctrine\Common\Cache\MemcacheCache```
- ```Doctrine\Common\Cache\ArrayCache```

