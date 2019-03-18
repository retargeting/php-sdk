<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 08:04
 */

namespace Retargeting;

class Checkout extends AbstractRetargetingSDK
{
    protected $productIds = [];

    /**
     * @return array
     */
    public function getProductIds(): array
    {
        return $this->productIds;
    }

    /**
     * @param array $productIds
     */
    public function setProductIds(array $productIds)
    {
        $this->productIds = $productIds;
    }

    /**
     * Prepare checkout ids
     * @return string
     */
    public function prepareCheckoutIds()
    {
        $productIds = is_array($this->getProductIds()) ? $this->getProductIds() : (array)$this->getProductIds();

        return $this->toJSON(
            $productIds
        );
    }
}