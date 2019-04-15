<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 08:03
 */

namespace RetargetingSDK;

use RetargetingSDK\Helpers\CodeHelper;

class Variation extends AbstractRetargetingSDK
{
    protected $code = '';
    protected $stock = false;
    protected $details = [];

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     */
    public function setStock(int $stock)
    {
        $this->stock = $stock;
    }

    /**
     * @return array
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param array $details
     */
    public function setDetails(array $details)
    {
        $this->details = $details;
    }

    /**
     * Prepare variation data
     * @return string
     */
    public function prepareVariationInfo()
    {
        return $this->toJSON([
            'code'      => $this->getCode(),
            'stock'     => (bool)$this->getStock(),
            'details'   => $this->getDetails()
        ]);
    }
}