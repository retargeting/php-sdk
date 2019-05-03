<?php

namespace RetargetingSDK\Javascript;

use RetargetingSDK\AbstractCredentials;
use RetargetingSDK\Brand;
use RetargetingSDK\Category;
use RetargetingSDK\Checkout;
use RetargetingSDK\Email;
use RetargetingSDK\Order;
use RetargetingSDK\Product;
use RetargetingSDK\Variation;

/**
 * Class Builder
 * @package RetargetingSDK\Javascript
 */
class Builder extends AbstractCredentials
{
    /**
     * @var array
     */
    private $items = [];

    /**
     * @param Email $email
     * @return Builder
     */
    public function setEmail(Email $email)
    {
        return $this->addItem(
            new Item\Email($email->getData())
        );
    }

    /**
     * @param Category $category
     * @return Builder
     */
    public function sendCategory(Category $category)
    {
        return $this->addItem(
            new Item\Category($category->getData())
        );
    }

    /**
     * @param Brand $brand
     * @return Builder
     */
    public function sendBrand(Brand $brand)
    {
        return $this->addItem(
            new Item\Brand($brand->getData())
        );
    }

    /**
     * @param Product $product
     * @return Builder
     * @throws \Exception
     */
    public function sendProduct(Product $product)
    {
        return $this->addItem(
            new Item\Product($product->getData())
        );
    }

    /**
     * @param $productId
     * @param $quantity
     * @param Variation $variation
     * @return Builder
     */
    public function addToCart($productId, $quantity, Variation $variation)
    {
        return $this->addItem(
            new Item\CartAdd($productId, $quantity, $variation)
        );
    }

    /**
     * @param $productId
     * @param $quantity
     * @param Variation $variation
     * @return Builder
     */
    public function removeFromCart($productId, $quantity, Variation $variation)
    {
        return $this->addItem(
            new Item\CartRemove($productId, $quantity, $variation)
        );
    }

    /**
     * @param $productId
     * @param Variation $variation
     * @return Builder
     */
    public function setVariation($productId, Variation $variation)
    {
        return $this->addItem(
            new Item\ProductVariation($productId, $variation)
        );
    }

    /**
     * @param $productId
     * @return Builder
     */
    public function addToWishList($productId)
    {
        return $this->addItem(
            new Item\ProductToWishList($productId)
        );
    }

    /**
     * @param $productId
     * @return Builder
     */
    public function commentOnProduct($productId)
    {
        return $this->addItem(
            new Item\ProductComment($productId)
        );
    }

    /**
     * @param $productId
     * @return Builder
     */
    public function likeFacebook($productId)
    {
        return $this->addItem(
            new Item\ProductLikeFB($productId)
        );
    }

    /**
     * @param $keywords
     * @return Builder
     */
    public function sendSearchTerm($keywords)
    {
        return $this->addItem(
            new Item\Search($keywords)
        );
    }

    /**
     * @param Order $order
     * @return Builder
     */
    public function saveOrder(Order $order)
    {
        return $this->addItem(
            new Item\Order($order->getData(), $order->getProductsData())
        );
    }

    /**
     * @return Builder
     */
    public function visitHomePage()
    {
        return $this->addItem(
            new Item\PageHome()
        );
    }

    /**
     * @return Builder
     */
    public function visitHelpPage()
    {
        return $this->addItem(
            new Item\PageHelp()
        );
    }

    /**
     * @return Builder
     */
    public function pageNotFound()
    {
        return $this->addItem(
            new Item\PageNotFound()
        );
    }

    /**
     * @param Checkout $checkout
     * @return Builder
     */
    public function checkoutIds(Checkout $checkout)
    {
        return $this->addItem(
            new Item\Checkout($checkout->getData())
        );
    }

    /**
     * @param $cartUrl
     * @return Builder
     */
    public function setCartUrl($cartUrl)
    {
        return $this->addItem(
            new Item\CartUrl($cartUrl)
        );
    }

    /**
     * @return string
     */
    public function getTrackingCode()
    {
        $code = '';

        if($this->hasTrackingApiKey())
        {
            $code  = 'var ra = document.createElement("script"); ra.type ="text/javascript"; ra.async = true; ra.src = ("https:" ==';
            $code .= 'document.location.protocol ? "https://" : "http://") + "' . $this->getTrackingApiKey() . '" + ra_key + ".js";';
            $code .= 'var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ra,s);})();';
        }

        return $code;
    }

    /**
     * @return string|null
     */
    public function getTrackingSrc()
    {
        $src = null;

        if($this->hasTrackingApiKey())
        {
            $src = 'https://tracking.retargeting.biz/v3/rajs/' . $this->getTrackingApiKey() . '.js';
        }

        return $src;
    }

    /**
     * @param bool $minify
     * @return string
     * @throws \RetargetingSDK\Exceptions\RTGException
     */
    public function generate($minify = true)
    {
        $outputParams  = 'var _ra = _ra || {};';
        $outputMethods = '';

        foreach($this->items AS $item)
        {
            $outputParams  .= $item->getParams();
            $outputMethods .= $item->getMethod();
        }

        if(!empty($outputMethods))
        {
            $outputMethods = 'if (_ra.ready !== undefined) { ' . $outputMethods . ' }';
        }

        $output  = '<script type="text/javascript">';

        if($minify)
        {
            $output .= JSMin::minify($outputParams . $outputMethods);
        }
        else
        {
            $output .= ($outputParams . $outputMethods);
        }

        $output .= '</script>';

        return $output;
    }

    /**
     * @param $item
     * @return $this
     */
    private function addItem($item)
    {
        $this->items[] = $item;

        return $this;
    }
}