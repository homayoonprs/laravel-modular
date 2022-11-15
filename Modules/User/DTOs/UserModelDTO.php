<?php

namespace Modules\Import\DTOs;

class UserModelDTO extends BaseDTO
{
    public function __construct(
        public string $name,
        public ?string $email,
        public bool $checked,
        public ?string $description,
        public ?string $address,
        public ?string $interest,
        public string $account,
        public ?string $date_of_birth,
        public ?array $credit_card,
    )
    {}

    public static function fromObject(object $data) :static
    {
        return new static(
            name: $data->name,
            email: $data->email,
            checked: $data->checked,
            description: $data?->description,
            address: $data?->address,
            interest: $data?->interest,
            account: $data->account,
            date_of_birth: $data?->date_of_birth,
            credit_card: CreditCardDTO::fromObject($data->credit_card)->toArray()
        );
    }
}
