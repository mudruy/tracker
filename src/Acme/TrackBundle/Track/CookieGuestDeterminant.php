<?php

namespace Acme\TrackBundle\Track;

class CookieGuestDeterminant {

    protected static $CookieName = 'cookie';
    const CookieValue = 'cvalue';

    /**
     * Определяет по наличию нашей куки, уникален посетитель или нет
     * @param string $domain
     * @return boolean
     */
    public static function isUnic($domain) {
        $ExpPeriod = 3600*24*7;
        // выбираем таймаукт куки из конфигурации

        self::$CookieName = md5($domain);
        if (isset($_COOKIE[self::$CookieName]))
            return false; // посетитель не уникален
        else {
            setcookie(self::$CookieName, self::CookieValue, time() + $ExpPeriod, '/');
            $_COOKIE[self::$CookieName] = self::CookieValue;
        }

        return true;
    }

}
