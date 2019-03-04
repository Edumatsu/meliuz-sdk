<?php

namespace App\Service\Meliuz;
use App\Service\Meliuz\Product;

/**
 * Class Products
 *
 * @package App\Service\Meliuz
 */
class Products implements \JsonSerializable
{
    
    private $products;

    public function populate(\stdClass $data)
    {
        $this->products = isset($data->products) ? $data->products : null;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }
}
