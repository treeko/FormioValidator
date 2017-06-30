<?php

namespace FormioValidator\Validate;

use FormioValidator\Config\Message;
use FormioValidator\Model\Validate;

class Max extends Validate
{
    const MAX = 'max';

    public function getErrorMessage()
    {
        return Message::getErrorMsg(self::MAX) . $this->getOption();
    }

    public function isValueValid($value)
    {
        if ((integer)$value > $this->getOption()) {
            return false;
        }
        return true;
    }
}