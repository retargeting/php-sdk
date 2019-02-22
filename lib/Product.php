<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 07:48
 */

namespace Retargeting;

/**
 * Class Product
 * @package Retargeting
 */
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
    public function getId()
    {
        return $this->id;
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
    public function setName($name): void
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
    public function setUrl($url): void
    {
        //@todo: verifica daca url-ul incepe cu http sau https....
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
    public function setImg($img): void
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
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getPromo(): float
    {
        return $this->promo;
    }

    /**
     * @param float $promo
     */
    public function setPromo(float $promo): void
    {
        $this->promo = $promo;
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
     */
    public function setBrand($brand): void
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
    public function setCategory(array $category): void
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
    public function setInventory(array $inventory): void
    {
        $this->inventory = $inventory;
    }

    /**
     * @return string
     */
    public function prepareProductInformation()
    {

        return $this->toJSON([
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
            'img' => $this->img,
            'price' => $this->price,
            'promo' => $this->promo,
            'brand' => $this->brand,
            'category' => $this->category,
            'inventory' => $this->inventory
        ]);

    }
}