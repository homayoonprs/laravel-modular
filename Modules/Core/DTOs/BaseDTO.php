<?php

namespace Modules\Core\DTOs;

abstract class BaseDTO
{

    abstract public static function fromObject(object $data) :static;

    public function toArray(): array
    {
        return call_user_func('get_object_vars', $this);
    }

}
