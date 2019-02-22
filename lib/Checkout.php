<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 08:04
 */

namespace Retargeting;

/**
 * Class Checkout
 * @package Retargeting
 */
class Checkout extends AbstractRetargetingSDK
{
    /**
     * @var array
     */
    protected $ids = [];

    /**
     * @return array
     */
    public function getIds(): array
    {
        return $this->ids;
    }

    /**
     * @param array $ids
     */
    public function setIds(array $ids)
    {
        $this->ids = $ids;
    }

    /**
     * @return array
     */
    public function prepareCheckoutIdsArray() {
        return $this->getIds();
    }

}