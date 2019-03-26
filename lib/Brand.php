<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 08:03
 */

namespace Retargeting;

use Retargeting\Helpers\BrandHelper;

class Brand extends AbstractRetargetingSDK
{
    protected $id;
    protected $name = '';

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Prepare brand information
     * @return string
     */
    public function prepareBrandInformation()
    {
        return $this->toJSON(BrandHelper::validate([
            'id' => $this->getId(),
            'name' => $this->getProperFormattedString($this->getName())
        ]));
    }
}