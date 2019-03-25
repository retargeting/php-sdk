<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 07:48
 */
namespace Retargeting;

use Retargeting\Helpers\BrandHelper;
use Retargeting\Helpers\CategoryHelper;
use Retargeting\Helpers\UrlHelper;
use Retargeting\Helpers\VariationsHelper;

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
    protected $additionalImages = [];

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
     * @return float
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * @param float $promo
     */
    public function setPromo($promo)
    {
        $this->promo = $promo;
    }

    /**
     * @return array
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param array $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return array
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param array $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return array
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * @param array $inventory
     */
    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
    }

    /**
     * @return array
     */
    public function getAdditionalImages()
    {
        return $this->additionalImages;
    }

    /**
     * @param array $additionalImages
     */
    public function setAdditionalImages($additionalImages)
    {
        $this->additionalImages = $additionalImages;
    }

    /**
     * Prepare product info to array
     * @return array
     * @throws \Exception
     */
    public function prepareProductInformation()
    {
        $id     = $this->formatIntFloatString($this->getId());
        $name   = $this->getProperFormattedString($this->getName());
        $url    = UrlHelper::validate($this->getUrl());
        $img    = UrlHelper::validate($this->getImg());

        $price  = $this->formatIntFloatString($this->getPrice());

        if($this->getPromo() > 0 && $this->getPromo() < $this->getPrice())
        {
            $promo = $this->formatIntFloatString($this->getPromo());
        }
        else
        {
            $promo = 0;
        }

        $brand      = BrandHelper::validate($this->getBrand());
        $category   = CategoryHelper::validate($this->getCategory());
        $inventory  = VariationsHelper::validate($this->getInventory());

        $additionalImages = $this->validateArrayData($this->getAdditionalImages());

        return [
            'id'        => $id,
            'name'      => $name,
            'url'       => $url,
            'img'       => $img,
            'price'     => $price,
            'promo'     => $promo,
            'brand'     => $brand,
            'category'  => $category,
            'inventory' => $inventory,
            'images'    => $additionalImages
        ];
    }

    /**
     * Prepare product info to array
     * @return string
     * @throws \Exception
     */
    public function prepareProductInformationToJson()
    {
        $data = self::prepareProductInformation();

        return $this->toJSON([
            'id'        => $data['id'],
            'name'      => $data['name'],
            'url'       => $data['url'],
            'img'       => $data['img'],
            'price'     => $data['price'],
            'promo'     => $data['promo'],
            'brand'     => $data['brand'],
            'category'  => $data['category'],
            'inventory' => $data['inventory'],
            'images'    => $data['images']
        ]);
    }
}