<?php

namespace FormioValidator\Validate;

use FormioValidator\Config\Message;
use FormioValidator\Model\Validate;

class Maxlength extends Validate
{
    const MAX_LENGTH = 'maxLength';

    public function getErrorMessage()
    {
        return Message::getError(self::MAX_LENGTH) . $this->getOption();
    }

    public function isValueValid($value)
    {
        if (strlen($value) > $this->getOption()) {
            return false;
        }
        return true;
    }
}