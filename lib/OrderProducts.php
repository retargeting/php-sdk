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
    protected $id;
    protected $quantity = false;
    protected $price;
    protected $variationCode;

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

    public function prepareOrderProductsInfo()
    {
        return $this->toJSON([
            'id' => $this->getId(),
            'quantity' => $this->getQuantity(),
            'price' => $this->getPrice(),
            'variation_code' => $this->getVariationCode()
        ]);
    }
}