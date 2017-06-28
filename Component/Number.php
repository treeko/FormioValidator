<?php

namespace FormioValidator\Component;

use FormioValidator\Model\Component;
use FormioValidator\Validate\Numeric;

class Number extends Component
{
    public function addCustomValidation()
    {
        $this->validate[] = new Numeric();
    }
}