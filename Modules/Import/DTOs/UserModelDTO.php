<?php

namespace Modules\Import\DTOs;

class UserModelDTO extends BaseDTO
{

    public function __construct(
        // TODO
        public string $name,
        public string $account,
        public ?string $email = null,
        public ?string $birthday = null,
        public ?string $address = null,
        public ?string $password = null,
        public ?string $email_verified_at = null,
    )
    {}

    public static function fromObject(object $data) :static
    {
        return new static(
           // TODO 
        );
    }
}