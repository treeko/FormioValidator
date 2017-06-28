<?php

namespace FormioValidator\Validate;

use FormioValidator\Model\Validate;

class Numeric extends Validate
{
    const NUMERIC = 'numeric';
    const MSG_ERROR = 'Value is not an integer';

    public function getErrorMessage()
    {
        return self::MSG_ERROR;
    }

    public function isValueValid($value)
    {
        if (!is_numeric($value)) {
            return false;
        }
        return true;
    }
}