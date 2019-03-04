<?php

namespace App\Service\Meliuz;

/**
 * Class Customer
 *
 * @package App\Service\Meliuz
 */
class Customer implements \JsonSerializable
{

    private $phone_number;

    private $cpf;

    private $cnpj;

    private $email;

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $this->phone_number = isset($data->phone_number) ? $data->phone_number : null;
        $this->cpf          = isset($data->cpf) ? $data->cpf : null;
        $this->cnpj         = isset($data->cnpj) ? $data->cnpj : null;
        $this->email        = isset($data->email) ? $data->email : null;
    }

    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}
