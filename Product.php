<?php

namespace App\Service\Meliuz;
/**
 * Class Payment
 *
 * @package App\Service\Meliuz
 */
class Payment implements \JsonSerializable
{

    private $ean_id;
    private $sku_id;
    private $name;
    private $industry;
    private $categories;
    private $quantity;
    private $measurement_unit;
    private $unit_value;
    private $total_discount_value;
    private $value;
    private $total_extra_value;
    private $total_value;
    private $total_commission_value;
    private $status;


    public function populate(\stdClass $data)
    {
        $this->ean_id               = isset($data->ean_id) ? $data->ean_id : null;
        $this->sku_id               = isset($data->sku_id) ? $data->sku_id : null;
        $this->name                 = isset($data->name) ? $data->name : null;
        //$this->industry             = isset($data->industry) ? $data->industry : null;
        $this->categories           = isset($data->categories) ? $data->categories : null;
        $this->quantity             = isset($data->quantity) ? $data->quantity : null;
        $this->measurement_unit     = isset($data->measurement_unit) ? $data->measurement_unit : null;
        $this->unit_value           = isset($data->unit_value) ? $data->unit_value : null;
        $this->total_discount_value = isset($data->total_discount_value) ? $data->total_discount_value : null;
        $this->value                = isset($data->value) ? $data->value : null;
        $this->total_extra_value    = isset($data->total_extra_value) ? $data->total_extra_value : null;
        $this->total_value          = isset($data->total_value) ? $data->total_value : null;
        $this->total_commission_value = isset($data->total_commission_value) ? $data->total_commission_value : null;
        $this->status               = isset($data->status) ? $data->status : null;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function setEanId($ean_id)
    {
        $this->ean_id = $ean_id;
    }

    public function setSkuId($sku_id)
    {
        $this->sku_id = $sku_id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /*public function setIndustry($industry)
    {
        $this->industry = $industry;
    }*/

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function setMeasurementUnit($measurement_unit)
    {
        $this->measurement_unit = $measurement_unit;
    }

    public function setUnitValue($unit_value)
    {
        $this->unit_value = $unit_value;
    }

    public function setTotalDiscountValue($total_discount_value)
    {
        $this->total_discount_value = $total_discount_value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setTotalExtraValue($total_extra_value)
    {
        $this->total_extra_value = $total_extra_value;
    }

    public function setTotalValue($total_value)
    {
        $this->total_value = $total_value;
    }

    public function setTotalCommissionValue($total_commission_value)
    {
        $this->total_commission_value = $total_commission_value;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
