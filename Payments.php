<?php

namespace App\Service\Meliuz;
use App\Service\Meliuz\Payment;

/**
 * Class Payments
 *
 * @package App\Service\Meliuz
 */
class Payments implements \JsonSerializable
{
    
    private $payments;

    public function populate(\stdClass $data)
    {
        $this->payments = isset($data->payments) ? $data->payments : null;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function addPayment(Payment $payment)
    {
        $this->payments[] = $payment;
    }
}
