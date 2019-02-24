<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 08:04
 */

namespace Retargeting;

/**
 * Class ProductFeed
 * @package Retargeting
 */
class ProductFeed extends AbstractRetargetingSDK
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items)
    {
        $this->items = $items;
    }

}