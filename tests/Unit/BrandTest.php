<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-15
 * Time: 17:40
 */

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Retargeting\Brand;

/**
 * Class BrandTest
 * @package Tests\Unit
 * @property Brand brand
 */
class BrandTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->brand = new Brand();
    }

    public function testIfBrandHasId()
    {
        $this->brand->setId(33);
        $this->assertNotNull($this->brand->getId());
    }

    public function testIfBrandHasName()
    {
        $this->brand->setName('Nike');
        $this->assertNotNull($this->brand->getName());
    }
}
