<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 08:04
 */

namespace Retargeting;

use Retargeting\Helpers\ProductFeedHelper;

class ProductFeed extends AbstractRetargetingSDK
{
    protected $productFeed = [];

    /**
     * @return array
     */
    public function getProductFeed()
    {
        return $this->productFeed;
    }

    /**
     * @param array $productFeed
     */
    public function setProductFeed($productFeed)
    {
        $this->productFeed = $productFeed;
    }

    /**
     * @return array|mixed
     */
    public function prepareProductFeed()
    {
        return $this->toJSON(ProductFeedHelper::validate($this->getProductFeed()));
    }
}