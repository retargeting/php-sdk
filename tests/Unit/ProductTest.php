<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-22
 * Time: 10:25
 */

namespace Retargeting;

use PHPUnit\Framework\TestCase;

/**
 * @property Product product
 */
class ProductTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function setUp(): void
    {
        $this->product = new Product();

        $this->product->setUrl('http://google.ro');
        $this->product->setImg('https://www.google.com/img.png');
    }

    /**
     * Test if product has product id
     */
    public function test_if_product_has_id()
    {
        $this->product->setId(123);
        $this->assertNotNull($this->product->getId());
    }

    /**
     * Test if product has name
     */
    public function test_if_product_has_name()
    {
        $this->product->setName('Fooo');
        $this->assertNotNull($this->product->getName());
    }

    /**
     * Test if name is a string
     */
    public function test_if_product_name_is_string()
    {
        $this->product->setName('Galaxy Tab 10.0');
        $this->assertIsString($this->product->getName(), 'Galaxy Tab 11.0');
    }

    /**
     * Test if product url is set up
     */
    public function test_if_product_url_is_set()
    {
        $this->assertEquals($this->product->getUrl(), 'http://google.ro');
    }

    /**
     * Test if product has an image
     */
    public function test_if_product_has_image()
    {
        $this->assertEquals($this->product->getImg(), 'https://www.google.com/img.png');
    }

    /**
     * Test if product has price
     */
    public function test_if_product_has_price()
    {
        $this->product->setPrice(100.20);
        $this->assertNotNull($this->product->getPrice());
    }

    /**
     * Test product price when is float
     */
    public function test_when_product_price_is_float()
    {
        $this->product->setPrice('12.33');
        $this->assertEquals($this->product->getPrice(), 12.33);
    }

    /**
     * Test product price when is integer
     */
    public function test_when_product_price_is_int()
    {
        $this->product->setPrice('12');
        $this->assertEquals($this->product->getPrice(), 12);
    }

    public function test_when_product_promo_price_is_zero_and_promo_is_greater_than_price()
    {
        $this->product->setPrice(20);
        $this->product->setPromo(80);
        $this->assertEquals($this->product->getPromo(), 0);
    }

    /**
     * Test if product brand is array
     */
    public function test_if_product_brand_is_array()
    {
        $this->product->setBrand([
            'id' => 1,
            'name' => 'Apple'
        ]);

        $this->assertIsArray($this->product->getBrand());
    }

    /**
     * Test if product has brand
     */
    public function test_if_product_has_brand()
    {
        $this->product->setBrand([
            'id' => '1',
            'name' => 'Apple'
        ]);

        $this->assertEquals($this->product->getBrand(), ['id' => 1, 'name' => 'Apple']);
    }

    /**
     *
     */
    public function test_if_product_category_has_correct_format_with_only_one_parent_category()
    {
        $this->product->setCategory([
            [
                "id" => 12,
                "name" => "Women footwear",
                "parent" => false,
                "breadcrumb" => []
            ]
        ]);

        $this->assertEquals($this->product->getCategory(), [
                "id" => 12,
                "name" => "Women footwear",
                "parent" => false,
                "breadcrumb" => []
        ]);
    }

    /**
     * Test if product has category
     */
    public function test_if_product_has_category_with_parent_category_and_breadcrumb()
    {
        $this->product->setCategory([
            [
                "id" => 75,
                "name" => "Men footwear",
                "parent" => false,
                "breadcrumb" => []
            ],
            [
                "id" => 22,
                "name" => "Sport sneakers",
                "parent" => 21,
                "breadcrumb" => [
                    ["id" => 21, "name" => "Sneakers", "parent" => 20],
                    ["id" => 20, "name" => "Shoes", "parent" => false]
                ]
            ]
        ]);

        $this->assertEquals($this->product->getCategory(), [
            [
                "id" => 75,
                "name" => "Men footwear",
                "parent" => false,
                "breadcrumb" => []
            ],
            [
                "id" => 22,
                "name" => "Sport sneakers",
                "parent" => 21,
                "breadcrumb" => [
                    ["id" => 21, "name" => "Sneakers", "parent" => 20],
                    ["id" => 20, "name" => "Shoes", "parent" => false]
                ]
            ]
        ]);
    }
}

