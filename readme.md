# Retargeting SDK 

## Overview
Retargeting SDK is a software development tool for E-Commerce platforms that simplifies the implementation of Retargeting extension.

## Minimum requirements
The Retargeting SDK requires at least PHP version 5.4.0 and it's also compatible with PHP >= 7.0.0.

## How to install
Clone the repository in your platform root folder.

## Example

### Product class for sendProduct implementation (Sample)

```php
use Retargeting/Product;

$brand = [
     'id' => 90, 
     'name' => 'Nike'
];

$category = [
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
];

$inventory = [
    'variations' => true,
    'stock' => [
        '42-B' => true,
        '42-C' => false,
        '42-R' => true,
    ]
];

$additionalImages = [
    'https://www.example.com/catalog/image/sneaker_1.png',
    'https://www.example.com/catalog/image/sneaker_2.png',
    'https://www.example.com/catalog/image/sneaker_3.png',
    'https://www.example.com/catalog/image/sneaker_4.png',
    'https://www.example.com/catalog/image/sneaker_5.png',
];

$product = new Product();
$product->setId(123);
$product->setName('Shoes');
$product->setUrl('https://www.example.com/shoes/sport-sneakers/sneaker_1');
$product->setImg('https://www.example.com/catalog/image/sneaker_1.png');
$product->setPrice(100.23);
$product->setPromo(80);
$product->setBrand($brand);
$product->setCategory($category);
$product->setInventory($inventory);
$product->setAdditionalImages($additionalImages)

echo $product->prepareProductInformation();
```

###Product class for sendProduct implementation (Response)

```json
[
    {
        "id": 42,
        "name": "Apple Cinema 30\"",
        "url": "http:\/\/localhost\/upload\/test",
        "img": "http:\/\/localhost\/upload\/image\/catalog\/demo\/apple_cinema_30.jpg",
        "price": 122,
        "promo": 90,
        "brand": {
            "id": "8",
            "name": "Apple"
        },
        "category": [
            {
                "id": "20",
                "name": "Desktops",
                "parent": false,
                "breadcrumb": []
            },
            {
                "id": "28",
                "name": "Monitors",
                "parent": "25",
                "breadcrumb": [
                    {
                        "id": "25",
                        "name": "Components",
                        "parent": false
                    }
                ]
            }
        ],
        "inventory": {
            "variations": true,
            "stock": [],
            "name": {
                "Small": true,
                "Medium": true,
                "Large": true,
                "Checkbox 1": true,
                "Checkbox 2": true,
                "Checkbox 3": true,
                "Checkbox 4": true,
                "Red": true,
                "Blue": true,
                "Green": true,
                "Yellow": true
            }
        },
        "images": [
            "http:\/\/localhost\/upload\/image\/catalog\/demo\/canon_logo.jpg",
            "http:\/\/localhost\/upload\/image\/catalog\/demo\/hp_1.jpg",
            "http:\/\/localhost\/upload\/image\/catalog\/demo\/compaq_presario.jpg",
            "http:\/\/localhost\/upload\/image\/catalog\/demo\/canon_eos_5d_1.jpg",
            "http:\/\/localhost\/upload\/image\/catalog\/demo\/canon_eos_5d_2.jpg"
        ]
    }
]
```

|    **Parameter**    |    **Type**    |    **Required**    |    **Description**    |
|---|---|---|---|
|  id  |  Number or text  |  Required  |  The product item identifier, ie. itemcode. It should identify to the sold product, but not necessarily some specific variant of the product. Must be unique in your site.  |
|	name	|	Text	|	Required	|	The product name	|
|	url	|	URL	|	Required	|	Complete URL of the item. Must start with http:// or https://.	|
|	img	|	URL	|	Required	|	Complete URL of an image of the item.	|
|	price	|	Number or text	|	Required	|	Current product price. If the product is on promotion (price is reduced) then this parameter gets the value of the price before promotion was applied to the product (old price).	|
|	promo	|	Number or text	|	Optional	|	Promotional price (new price). When the product isn’t on promotion (no reduced price), send value 0.	|
|	stock	|	Bool (0/1)	|	Required	|	Stock of the product.For product in stock send value 1. When the product isn’t on stock send value 0.	|
|	brand	|	Object	|	Required	|	Details about product brand. If the product does not belong to any brand, send false value. The object containing brand details, has the following properties: id, name.	|
|	brand.id	|	Number or text	|	Required	|	The brand item identifier.	|
|	brand.name	|	Text	|	Required	|	Brand name	|
|	category	|	Object	|	Required	|	An object that contain details about products category. The object should contain the following properties: id, name, parent	|
|	category.id	|	Number or text	|	Required	|	The category identifier	|
|	category.name	|	Text	|	Required	|	Category name	|
|	category.parent	|	Number, text, false	|	Required	|	Id of parent category. If there isn’t any parent category, send false value.	|
|	breadcrumb	|	Array	|	Required	|	Array containing all the parent categories of the category to which the product belongs (in this array you must not add the product category). If the category does not have a parent category (category.parent is set false), send an empty array. Each parent category is sent as object and contains the following properties: id, name, parent.	|
|	breadcrumb.id	|	Number or text	|	Required	|	Category id	|
|	breadcrumb.name	|	Text	|	Required	|	Category Name	|
|	breadcrumb.parent	|	Number, text, false	|	Required	|	Id of parent category. If there isn’t any parent category, send false value.	|
|	inventory	|	Object	|	Required	|	Inventory details	|
|	inventory.variations	|	True/False	|	Required	|	True for products with variations. False for products without variations.	|
|	inventory.stock	|	True/False/Object	|	Required	|	For product with variations, you should send an object with stock for each variations.	|
|	callback_function	|	Function	|	Optional	|	With this parameter you can define a function that runs itself after the action’s parent function executes	|
