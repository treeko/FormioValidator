<?php

namespace FormioValidator\Component;

use FormioValidator\Model\Component;
use FormioValidator\Validate\Email as EmailValidate;

class Email extends Component
{
    public function addCustomValidation()
    {
        $this->validate[] = new EmailValidate();
    }
}