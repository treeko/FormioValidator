<?php

namespace FormioValidator\Validate;

use FormioValidator\Config\Message;
use FormioValidator\Model\Validate;

class Email extends Validate
{
    const EMAIL = 'email';

    public function getErrorMessage()
    {
        return Message::getError(self::EMAIL);
    }

    public function isValueValid($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
}