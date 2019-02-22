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
    protected $id;
    protected $name;
    protected $parent = false;
    protected $breadCrumb = [];

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
     * @return bool
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param bool $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return array
     */
    public function getBreadCrumb(): array
    {
        return $this->breadCrumb;
    }

    /**
     * @param array $breadcrumb
     */
    public function setBreadCrumb($breadCrumb)
    {
        /*@TODO: de verificat date intrare ( id,nume,parent)*/
        $this->breadCrumb = $breadCrumb;
    }

    /**
     * @return string
     */
    public function prepareCategoryInfo()
    {
        return $this->toJSON([
            'id' => $this->id,
            'name' => $this->name,
            'parent' => $this->parent,
            'breadcrumb' => $this->breadCrumb
        ]);
    }
}