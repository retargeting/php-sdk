<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 07:48
 */
namespace Retargeting;

use Retargeting\Validators\Product\BrandValidator;
use Retargeting\Validators\Product\CategoryValidator;
use Retargeting\Validators\Product\UrlValidator;
use Retargeting\Validators\Product\VariationsValidator;

class Product extends AbstractRetargetingSDK
{
    protected $id = 0;
    protected $name = '';
    protected $url = '';
    protected $img = '';
    protected $price = '';
    protected $promo = 0;
    protected $brand = [];
    protected $category = [];
    protected $inventory = [];

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
        return $this->getProperFormattedString($this->name);
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param $url
     * @return array|bool|mixed
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getPromo(): int
    {
        return $this->promo;
    }

    /**
     * @param int $promo
     */
    public function setPromo(int $promo)
    {
        $this->promo = $promo;
    }

    /**
     * @return array
     */
    public function getBrand(): array
    {
        return $this->brand;
    }

    /**
     * @param array $brand
     */
    public function setBrand(array $brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return array
     */
    public function getCategory(): array
    {
        return $this->category;
    }

    /**
     * @param array $category
     */
    public function setCategory(array $category)
    {
        $this->category = $category;
    }

    /**
     * @return array
     */
    public function getInventory(): array
    {
        return $this->inventory;
    }

    /**
     * @param array $inventory
     */
    public function setInventory(array $inventory)
    {
        $this->inventory = $inventory;
    }

    /**
     * Prepare product information
     * @return string
     */
    public function prepareProductInformation()
    {
        $id     = $this->formatIntFloatString($this->getId());
        $name   = $this->getProperFormattedString($this->getName());
        $url    = UrlValidator::validate($this->getUrl());

        $price  = $this->formatIntFloatString($this->getPrice());

        if($this->getPromo() > 0)
        {
            $promo = $this->formatIntFloatString($this->getPromo());
        }
        else
        {
            $promo = 0;
        }

        $brand      = BrandValidator::validate($this->getBrand());
        $category   = CategoryValidator::validate($this->getCategory());
        $inventory  = VariationsValidator::validate($this->getInventory());

        return $this->toJSON([
            'id'        => $id,
            'name'      => $name,
            'url'       => $url,
            'img'       => $this->getImg(),
            'price'     => $price,
            'promo'     => $promo,
            'brand'     => $brand,
            'category'  => $category,
            'inventory' => $inventory
        ]);
    }
}