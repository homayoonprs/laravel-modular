<?php

namespace Modules\Import\DTOs;

class CreditCardDTO extends BaseDTO
{

    public function __construct(
        public string $type,
        public string $number,
        public string $name,
        public string $expirationDate,
    )
    {}

    public static function fromObject(object $data): static
    {
        return new static(
            type: $data->type,
            number: $data->number,
            name: $data->name,
            expirationDate: $data->expirationDate
        );
    }
}
