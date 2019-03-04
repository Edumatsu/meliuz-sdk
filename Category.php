<?php

namespace App\Service\Meliuz;
/**
 * Class Payment
 *
 * @package App\Service\Meliuz
 */
class Payment implements \JsonSerializable
{

    private $category_id;
    private $category_name;

    public function populate(\stdClass $data)
    {
        $this->category_id   = isset($data->category_id) ? $data->category_id : null;
        $this->category_name = isset($data->category_name) ? $data->category_name : null;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function setCategoryName($category_name)
    {
        $this->category_name = $category_name;
    }
}
