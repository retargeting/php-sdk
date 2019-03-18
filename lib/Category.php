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
    protected $parent = 0;
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
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getParent(): int
    {
        return $this->parent;
    }

    /**
     * @param int $parent
     */
    public function setParent(int $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return array
     */
    public function getBreadcrumb(): array
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
        $id = $this->getProperFormattedString($this->getId());
        $name = $this->getProperFormattedString($this->getName());

        $parent = is_bool($this->getParent()) && !$this->getParent() ? false : $this->getParent();

        return $this->toJSON([
            'id'            => $id,
            'name'          => $name,
            'parent'        => $parent,
            'breadcrumb'    => $this->getBreadcrumb()
        ]);
    }
}