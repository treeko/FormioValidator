<?php

namespace FormioValidator\Validate;

use FormioValidator\Model\Validate;

class Max extends Validate
{
    const MAX = 'max';
    const MSG_ERROR = 'Value is larger than: ';

    public function getErrorMessage()
    {
        return self::MSG_ERROR . $this->getOption();
    }

    public function isValueValid($value)
    {
        if ((integer)$value > $this->getOption()) {
            return false;
        }
        return true;
    }
}