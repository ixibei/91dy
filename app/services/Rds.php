<?php
use Predis\Client;
/**
 * \Redis
 */
class Rds {

    const CONFIG_FILE = '\config\redis.php';
    public static $baseDir;
    protected static $redis;

    public static function init() {
        self::$baseDir = dirname(dirname(__FILE__));
        self::$redis = new Client(Config::get('redis'));
    }

    public static function set($key, $value, $time = null, $unit = null) {
        self::init();
        if ($time) {
            switch ($unit) {
                case 'h':
                    $time *= 3600;
                    break;
                case 'm':
                    $time *= 60;
                    break;
                case 's':
                case 'ms':
                    break;
                default:
                    throw new InvalidArgumentException('单位只能是 h m s ms');
                    break;
            }

            if ($unit == 'ms') {
                self::_psetex($key, $value, $time);
            } else {
                self::_setex($key, $value, $time);
            }
        } else {
            self::$redis->set($key, $value);
        }
    }

    public static function get($key) {
        self::init();
        return self::$redis->get($key);
    }

    public static function exists($key) {
        self::init();
        return self::$redis->exists($key);
    }

    public static function delete($key) {
        self::init();
        return self::$redis->del($key);
    }

    private static function _setex($key, $value, $time) {
        self::$redis->setex($key, $time, $value);
    }

    private static function _psetex($key, $value, $time) {
        self::$redis->psetex($key, $time, $value);
    }

}