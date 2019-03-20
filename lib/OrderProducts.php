<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-15
 * Time: 13:27
 */

namespace Retargeting;

class OrderProducts extends AbstractRetargetingSDK
{
    protected $id = '';
    protected $quantity = 0;
    protected $price = 0;
    protected $variationCode = '';

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return boolean
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param boolean $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getVariationCode()
    {
        return $this->variationCode;
    }

    /**
     * @param mixed $variationCode
     */
    public function setVariationCode($variationCode)
    {
        $this->variationCode = $variationCode;
    }

    /**
     * Prepare order products for save order
     * @return string
     */
    public function prepareOrderProductsInfo()
    {
        return $this->toJSON([
            'id' => $this->formatIntFloatString($this->getId()),
            'quantity' => $this->formatIntFloatString($this->getQuantity()),
            'price' => $this->formatIntFloatString($this->getPrice()),
            'variation_code' => $this->getProperFormattedString($this->getVariationCode())
        ]);
    }
}