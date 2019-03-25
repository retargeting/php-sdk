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
        $id = $this->formatIntFloatString($id);

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
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param $url
     * @throws \Exception
     */
    public function setUrl($url)
    {
        $url = UrlHelper::validate($url);

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
     * @param $img
     * @throws \Exception
     */
    public function setImg($img)
    {
        $img = UrlHelper::validate($img);

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
        $price = $this->formatIntFloatString($price);

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
        if($promo > 0 && $promo < $this->getPrice())
        {
            $promo = $this->formatIntFloatString($promo);
        }
        else
        {
            $promo = 0;
        }

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
        $brand = BrandHelper::validate($brand);

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
        $category   = CategoryHelper::validate($category);

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
        $inventory  = VariationsHelper::validate($inventory);

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
        $additionalImages = $this->validateArrayData($additionalImages);

        $this->additionalImages = $additionalImages;
    }

    /**
     * Prepare product info to array
     * @return array
     * @throws \Exception
     */
    public function prepareProductInformation()
    {
        return [
            'id'        => $this->getId(),
            'name'      => $this->getName(),
            'url'       => $this->getUrl(),
            'img'       => $this->getImg(),
            'price'     => $this->getPrice(),
            'promo'     => $this->getPromo(),
            'brand'     => $this->getBrand(),
            'category'  => $this->getCategory(),
            'inventory' => $this->getInventory(),
            'images'    => $this->getAdditionalImages()
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