<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 08:02
 */

namespace Retargeting;

/**
 * Class Category
 * @package Retargeting
 */
class Category extends AbstractRetargetingSDK
{
    protected $id = 0;
    protected $name = '';
    protected $parent = false;
    protected $breadcrumb = [];

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
        $id = $this->getProperFormattedString($id);

        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $name = $this->getProperFormattedString($name);

        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param int $parent
     */
    public function setParent($parent)
    {
        $parent = is_bool($parent) && !$parent ? false : $parent;

        $this->parent = $parent;
    }

    /**
     * @return array
     */
    public function getBreadcrumb()
    {
        return $this->breadcrumb;
    }

    /**
     * @param array $breadcrumb
     */
    public function setBreadcrumb(array $breadcrumb)
    {
        $this->breadcrumb = $breadcrumb;
    }

    /**
     * Prepare category data
     * @return string
     */
    public function prepareCategoryData()
    {
        return $this->toJSON([
            'id'            => $this->getId(),
            'name'          => $this->getName(),
            'parent'        => $this->getParent(),
            'breadcrumb'    => $this->getBreadcrumb()
        ]);
    }
}