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
        $productIds = is_array($productIds) ? $productIds : (array)$productIds;

        $this->productIds = $productIds;
    }

    /**
     * Prepare checkout ids
     * @return string
     */
    public function prepareCheckoutIds()
    {
        return $this->toJSON(
            $this->getProductIds()
        );
    }
}