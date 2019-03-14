<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 07:48
 */
namespace Retargeting;

class Product extends AbstractRetargetingSDK
{
    protected $id;
    protected $name;
    protected $url;
    protected $img;
    protected $price;
    protected $promo = 0;
    protected $brand = null;
    protected $category = [];
    protected $inventory = [];
    protected $additionalImages = [];

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $url
     * @param $img
     * @param $price
     * @param $promo
     * @param $brand
     * @param $category
     * @param $inventory
     * @param $additionalImages
     */
    public function __construct($id, $name, $url, $img, $price, $promo, $brand, $category, $inventory, $additionalImages)
    {
        $this->id = $id;
        $this->name = $name;
        $this->url = $url;
        $this->img = $img;
        $this->price = $price;
        $this->promo = $promo;
        $this->brand = $brand;
        $this->category = $category;
        $this->inventory = $inventory;
        $this->additionalImages = $additionalImages;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
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
     * @return Product
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
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
     * @return Product
     */
    public function setImg($img)
    {
        $this->img = $img;
        return $this;
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
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
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
     * @return Product
     */
    public function setPromo(int $promo): Product
    {
        $this->promo = $promo;
        return $this;
    }

    /**
     * @return null
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param null $brand
     * @return Product
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;
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
     * @return Product
     */
    public function setCategory(array $category): Product
    {
        $this->category = $category;
        return $this;
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
     * @return Product
     */
    public function setInventory(array $inventory): Product
    {
        $this->inventory = $inventory;
        return $this;
    }

    /**
     * @return array
     */
    public function getAdditionalImages(): array
    {
        return $this->additionalImages;
    }

    /**
     * @param array $additionalImages
     * @return Product
     */
    public function setAdditionalImages(array $additionalImages): Product
    {
        $this->additionalImages = $additionalImages;
        return $this;
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
            'inventory' => $this->getInventory(),
            'additionalImages' => $this->getAdditionalImages()
        ]);
    }
}