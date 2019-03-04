<?php

namespace App\Service\Meliuz;
/**
 * Class Payment
 *
 * @package App\Service\Meliuz
 */
class Payment implements \JsonSerializable
{
    
    private $method;

    private $value;

    private $installments;

    private $authorization_code;

    private $bin;

    private $brand;

    private $change_value;

    public function populate(\stdClass $data)
    {
        $this->method               = isset($data->method) ? $data->method : null;
        $this->value                = isset($data->value) ? $data->value : null;
        $this->installments         = isset($data->installments) ? $data->installments : null;
        $this->authorization_code   = isset($data->authorization_code) ? $data->authorization_code : null;
        $this->bin                  = isset($data->bin) ? $data->bin : null;
        $this->brand                = isset($data->brand) ? $data->brand : null;
        $this->change_value         = isset($data->change_value) ? $data->change_value : null;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setInstallments($installments)
    {
        $this->installments = $installments;
    }

    public function setAuthorizationCode($authorization_code)
    {
        $this->authorization_code = $authorization_code;
    }

    public function setBin($bin)
    {
        $this->bin = $bin;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function setChangeValue($change_value)
    {
        $this->change_value = $change_value;
    }

}
