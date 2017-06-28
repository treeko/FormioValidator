<?php

namespace FormioValidator\Validate;

use FormioValidator\Model\Validate;

class Email extends Validate
{
    const EMAIL = 'email';
    const MSG_ERROR = 'Invalid email format';

    public function getErrorMessage()
    {
        return self::MSG_ERROR;
    }

    public function isValueValid($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
}