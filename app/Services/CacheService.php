<?php

namespace App\Services;


use Cache;
use DateInterval;

/**
 * The purpose of this Service is
 * to enable sharing of redis instance
 * among several backends/micro-services
 * using unique prefix for each application
 *
 * Class CacheService
 * @package App\Services
 */
class CacheService {
    const APP_IDENTIFIER = "mbti";

    public function hasCache($key) {
        return Cache::has($this->_getFullCacheKey($key));
    }

    public function setCache($key, $value) {
        return Cache::put($this->_getFullCacheKey($key), $value, new DateInterval("P7D"));
    }

    public function getCache($key) {
        return Cache::get($this->_getFullCacheKey($key));
    }

    public function removeCache($key) {
        return Cache::forget($this->_getFullCacheKey($key));
    }

    private function _getFullCacheKey($key) {
        return self::APP_IDENTIFIER . "_" . $key;
    }
}