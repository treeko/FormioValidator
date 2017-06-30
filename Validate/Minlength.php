<?php

namespace FormioValidator\Validate;

use FormioValidator\Config\Message;
use FormioValidator\Model\Validate;

class Minlength extends Validate
{
    const MIN_LENGTH = 'minLength';

    public function getErrorMessage()
    {
        return Message::getErrorMsg(self::MIN_LENGTH) . $this->getOption();
    }

    public function isValueValid($value)
    {
        if (strlen($value) < $this->getOption()) {
            return false;
        }
        return true;
    }
}