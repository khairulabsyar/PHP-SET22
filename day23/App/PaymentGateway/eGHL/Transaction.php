<?php

// namespace App\PaymentGateway\eGHL;

// class Transaction
// {
//     public CustomerProfile $customerProfile;
//     public function __construct()
//     {
//         var_dump(new customerProfile());
//     }
// }

// ----- redo on 5/9

namespace App\PaymentGateway\eGHL;

// use DateTime;

// class Transaction
// {
//     public CustomerProfile $customerProfile;
//     public function __construct()
//     {
//         // var_dump(new DateTime());
//         // or
//         // var_dump(new \DateTime());
//         var_dump(new customerProfile());
//         // var_dump(explode('.', 'hello world'));
//     }
// }

// above explode will be replaced with the function below
// function explode($seperator, $str)
// {
//     return 'foo';
// }

// constant
// class Transaction
// {
//     public const STATUS_PAID = 'paid';
//     public const STATUS_PENDING = 'pending';
//     public const STATUS_DECLINED = 'declined';
//     public const ALL_STATUSES = [
//         self::STATUS_PAID => "PAID",
//         self::STATUS_PENDING => "PENDING",
//         self::STATUS_DECLINED => "DECLINED",
//     ];

//     public function __construct()
//     {
//         // $this->setStatus(self::STATUS_PENDING);
//     }

//     // public function setStatus(string $status): self
//     // {
//     //     $this->status = $status;
//     //     return $this;
//     // }

//     public function setStatus(string $status): self
//     {
//         if (!isset(self::ALL_STATUSES[$status])) {
//             throw new \InvalidArgumentException('Invalid Status');
//         };
//         $this->status = $status;
//         return $this;
//     }
// }

// constant enum
use App\Enums\Status;

class Transaction
{
    public function __construct()
    {
        $this->setStatus(Status::PENDING);
    }

    public function setStatus(string $status): self
    {
        if (!isset(Status::ALL_STATUSES[$status])) {
            throw new \InvalidArgumentException('Invalid status');
        }

        $this->status = Status::ALL_STATUSES[$status];

        return $this;
    }
}