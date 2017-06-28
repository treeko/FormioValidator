<?php

namespace FormioValidator\Validate;

use FormioValidator\Model\Validate;

class Minlength extends Validate
{
    const MIN_LENGTH = 'minLength';
    const MSG_ERROR = 'Value is shorter than: ';

    public function getErrorMessage()
    {
        return self::MSG_ERROR . $this->getOption();
    }

    public function isValueValid($value)
    {
        if (strlen($value) < $this->getOption()) {
            return false;
        }
        return true;
    }
}