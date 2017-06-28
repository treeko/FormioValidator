<?php

namespace FormioValidator\Validate;

use FormioValidator\Model\Validate;

class Maxlength extends Validate
{
    const MAX_LENGTH = 'maxLength';
    const MSG_ERROR = 'Value is longer than: ';

    public function getErrorMessage()
    {
        return self::MSG_ERROR . $this->getOption();
    }

    public function isValueValid($value)
    {
        if (strlen($value) > $this->getOption()) {
            return false;
        }
        return true;
    }
}