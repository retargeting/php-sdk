<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 07:48
 */
namespace Retargeting;

use Retargeting\Validations\UrlValidator;

class Product extends AbstractRetargetingSDK
{
    protected $id = '';
    protected $name;
    protected $url = '';
    protected $img;
    protected $price;
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
     * @param mixed $url
     */
    public function setUrl($url)
    {
        if(UrlValidator::validate($url))
        {
            $this->url = $url;
        }
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
     * @return string
     */
    public function prepareProductInformation()
    {
        return $this->toJSON([
            'id'        => $this->getId(),
            'name'      => $this->getName(),
            'url'       => $this->getUrl(),
            'img'       => $this->getImg(),
            'price'     => $this->getPrice(),
            'promo'     => $this->getPromo(),
            'brand'     => $this->getBrand(),
            'category'  => $this->getCategory(),
            'inventory' => $this->getInventory()
        ]);
    }
}