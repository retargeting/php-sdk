<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 08:04
 */

namespace Retargeting;


class ProductFeed
{
    protected $productFeed = [];

    /**
     * @return array
     */
    public function getProductFeed(): array
    {
        return $this->productFeed;
    }

    /**
     * @param array $productFeed
     */
    public function setProductFeed(array $productFeed)
    {
        $this->productFeed = $productFeed;
    }
}