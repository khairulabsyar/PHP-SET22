<?php

namespace App\PaymentGateway\Stripe;
//remove enums
use App\Enums\Status;

class Transaction
{
    //consts
    public const STATUS_PAID = 'paid';
    public const STATUS_PENDING = 'pending';
    public const STATUS_DECLINE = 'decline';
    // property
    public $foo = 'foo';

    //look up look up tables
    public const ALL_STATUSES = [
        self::STATUS_PAID => 'Paid',
        self::STATUS_PENDING => 'Waiting for payment',
        self::STATUS_DECLINE => 'Decline',
    ];

    public function __construct()
    {
        var_dump(Transaction::STATUS_DECLINE);
        // or use self as const is tied to the class and not function
        // var_dump(self::STATUS_DECLINE);
        // var_dump($this->foo);
        // $this->setStatus(Status::PAID);
    }

    public function setStatus(string $status): self
    {
        if (!isset(Status::ALL_STATUSES[$status])) {
            throw new \InvalidArgumentException('Invalid Status');
        }

        $this->status = $status;

        return $this;
    }
}