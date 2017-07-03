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
    public function make(array $container)
    {
        $result = [];
        foreach ($container as $item => $value) {
            if ($value !== null && $value !== '' && $value !== false) {
                switch ($item) {
                    case Maxlength::MAX_LENGTH:
                        $result[] = (new Maxlength($value));
                        break;
                    case Minlength::MIN_LENGTH:
                        $result[] = (new Minlength($value));
                        break;
                    case Max::MAX:
                        $result[] = (new Max($value));
                        break;
                    case Min::MIN:
                        $result[] = (new Min($value));
                        break;
                    case Required::REQUIRED:
                        $result[] = (new Required($value));
                        break;
                }
            }
        }
        return $result;
    }
}