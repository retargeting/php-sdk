<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-15
 * Time: 17:36
 */

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Retargeting\Category;

/**
 * @property Category category
 */
class CategoryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->category = new Category();
    }

    public function testIfCategoryHasId()
    {
        $this->category->setId(89);
        $this->assertNotNull($this->category->getId());
    }
}