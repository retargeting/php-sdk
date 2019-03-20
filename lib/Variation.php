<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 08:03
 */

namespace Retargeting;

use Retargeting\Helpers\CodeHelper;

class Variation extends AbstractRetargetingSDK
{
    protected $code = '';
    protected $stock = 0;
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
    public function getDetails(): array
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
        $code = CodeHelper::validate($this->getCode());
        $stock = (bool)$this->getStock();

        return $this->toJSON([
            'code' => $code,
            'stock' => $stock,
            'details' => $this->getDetails()
        ]);
    }
}