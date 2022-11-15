<?php

namespace Modules\User\DTOs;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Modules\Core\DTOs\BaseDTO;

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
        public ?int $age
    )
    {}

    public static function fromObject(object $data) :static
    {

        $date_of_birth = self::fixDate($data->date_of_birth);

        return new static(
            name: $data->name,
            email: $data->email,
            checked: $data->checked,
            description: $data?->description,
            address: $data?->address,
            interest: $data?->interest,
            account: $data->account,
            date_of_birth: $date_of_birth,
            credit_card: CreditCardDTO::fromObject($data->credit_card)->toArray(),
            age: Carbon::parse($date_of_birth)->diffInYears(Carbon::now())
        );
    }

    public static function fixDate($date)
    {

        if (Str::contains($date,'/')){
            return Carbon::create(...array_reverse(explode('/',$date)))->format('Y-m-d');
        }

        if (Str::contains($date,' ')){
            return Carbon::parse(explode(' ',$date)[0])->format('Y-m-d');
        }

        return Carbon::parse($date)->format('Y-m-d');
    }
}
