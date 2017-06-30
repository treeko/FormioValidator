<?php

namespace FormioValidator\Component;

use FormioValidator\Model\Component;
use FormioValidator\Validate\Choice;

class Select extends Component
{
    public function addCustomValidation()
    {
        $this->validate[] = new Choice($this->component['data']['values']);
    }
}