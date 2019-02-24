<?php
/**
 * Created by PhpStorm.
 * User: serban
 * Date: 2/24/19
 * Time: 7:57 PM
 */

namespace Retargeting;
require 'vendor/autoload.php';
$feed = new ProductFeed();
$feed->setItems([
    [
        'id' => 1,
        'price' => 200,
        'promo' => 150,
        'promo_price_end_date' => null,
        'inventory' => [
            'variants' => false,
            'stock'=> true
        ],
        'user_group' => [],
        'product_availabilty' => null,
    ],
    [
        'id' => 2,
        'price' => 30,
        'promo' => 15,
        'promo_price_end_date' => null,
        'inventory' => [
            'variants' => false,
            'stock'=> true
        ],
        'user_group' => [],
        'product_availabilty' => null,
    ],
    [
        'id' => 3,
        'price' => 220,
        'promo' => 170,
        'promo_price_end_date' => null,
        'inventory' => [
            'variants' => false,
            'stock'=> true
        ],
        'user_group' => [],
        'product_availabilty' => null,
    ]
]);

var_dump($feed->getItems());