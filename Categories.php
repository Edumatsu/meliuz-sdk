<?php

namespace App\Service\Meliuz;
use App\Service\Meliuz\Category;

/**
 * Class Categories
 *
 * @package App\Service\Meliuz
 */
class Categories implements \JsonSerializable
{
    
    private $categories;

    public function populate(\stdClass $data)
    {
        $this->categories = isset($data->categories) ? $data->categories : null;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function addCategory(Category $category)
    {
        $this->categories[] = $category;
    }
}
