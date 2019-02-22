# Retargeting SDK

```php
require "vendor/autoload.php";

$product = new \Retargeting\Product();
$product->setId(123);
$product->setName('Fooo');
$product->setUrl('https://retargeting.biz');

var_dump($product->prepareProductInformation());
```