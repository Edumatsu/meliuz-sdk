<?php

namespace App\Service\Meliuz;
/**
 * Class Affiliate
 *
 * @package App\Service\Meliuz
 */
class Affiliate implements \JsonSerializable
{
    private $order_id;

    private $partner_id;

    private $branch_id;

    private $employee_id;

    private $terminal_id;

    public function populate(\stdClass $data)
    {
        $this->order_id            = isset($data->order_id) ? $data->order_id : null;
        $this->partner_id          = isset($data->partner_id) ? $data->partner_id : null;
        $this->branch_id           = isset($data->branch_id) ? $data->branch_id : null;
        $this->employee_id         = isset($data->employee_id) ? $data->employee_id : null;
        $this->terminal_id         = isset($data->terminal_id) ? $data->terminal_id : null;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function setOrderId($orderId)
    {
        $this->order_id = $orderId;
    }

    public function setPartnerId($partnerId)
    {
        $this->partner_id = $partnerId;
    }

    public function setBranchId($branchId)
    {
        $this->branch_id = $branchId;
    }

    public function setEmployeeId($employeeId)
    {
        $this->employee_id = $employeeId;
    }

    public function setTerminalId($terminalId)
    {
        $this->terminal_id = $terminalId;
    }
}
