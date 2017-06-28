<?php

namespace FormioValidator\Factory;

use FormioValidator\Model\Factory;
use FormioValidator\Validate\Max;
use FormioValidator\Validate\Maxlength;
use FormioValidator\Validate\Min;
use FormioValidator\Validate\Minlength;
use FormioValidator\Validate\Required;

class ValidateFactory extends Factory
{
    public function make()
    {
        foreach ($this->getContainer() as $item => $value) {
            if ($value !== null || $value !== '' || $value !== false) {
                switch ($item) {
                    case Maxlength::MAX_LENGTH:
                        $this->setProduct(new Maxlength($value));
                        break;
                    case Minlength::MIN_LENGTH:
                        $this->setProduct(new Minlength($value));
                        break;
                    case Max::MAX:
                        $this->setProduct(new Max($value));
                        break;
                    case Min::MIN:
                        $this->setProduct(new Min($value));
                        break;
                    case Required::REQUIRED:
                        $this->setProduct(new Required($value));
                        break;
                }
            }
        }
        return $this;
    }
}