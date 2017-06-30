<?php

namespace FormioValidator\Validate;

use FormioValidator\Config\Message;
use FormioValidator\Model\Validate;

class Numeric extends Validate
{
    const NUMERIC = 'numeric';

    public function getErrorMessage()
    {
        return Message::getErrorMsg(self::NUMERIC);
    }

    public function isValueValid($value)
    {
        if (!is_numeric($value)) {
            return false;
        }
        return true;
    }
}