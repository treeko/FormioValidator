<?php

namespace FormioValidator\Config;

class Message
{
    const ERROR_CHOICE = 'Value is not in choices pool';
    const ERROR_EMAIL = 'Invalid email format';
    const ERROR_MAX = 'Value is larger than: ';
    const ERROR_MIN = 'Value is smaller than: ';
    const ERROR_MAXLENGTH = 'Value is longer than: ';
    const ERROR_MINLENGTH = 'Value is shorter than: ';
    const ERROR_NUMERIC = 'Value is not an integer';
    const ERROR_REQUIRED = 'Value is required';

    const PL_ERROR_CHOICE = 'Wartość wyboru nie jest dozwolona';
    const PL_ERROR_EMAIL = 'Nieprawidłowy format adresu email';
    const PL_ERROR_MAX = 'Wynik jest większy niż: ';
    const PL_ERROR_MIN = 'Wynik jest mniejszy niż: ';
    const PL_ERROR_MAXLENGTH = 'Wynik jest dłuższy niż: ';
    const PL_ERROR_MINLENGTH = 'Wynik jest krótszy niż: ';
    const PL_ERROR_NUMERIC = 'Wynik nie jest liczbą';
    const PL_ERROR_REQUIRED = 'Wynik jest wymagany';

    static public $lang = 'PL_';

    static public function getError($type)
    {
        return constant('self::'.self::$lang . 'ERROR_' . strtoupper($type));
    }
}