<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-18
 * Time: 12:46
 */

namespace Retargeting\Helpers;

class VariationsHelper extends AbstractHelper implements Helper
{
    /**
     * Format variations object
     * @param mixed $variationData
     * @return array|\stdClass
     */
    public static function validate($variationData)
    {
        $variationArr = [];

        if(is_array($variationData) &&
            array_key_exists( 'stock', $variationData) &&
            array_key_exists('variations', $variationData))
        {
            if(!$variationData['variations'])
            {
                $variationArr['stock'] = $variationData->stock;
                $variationArr['variations'] = false;
            }
            else
            {
                $variationArr['variations'] = $variationData->variations;
                $variationArr['stock'] = $variationData->stock;
            }
        }

        return json_encode($variationArr, JSON_PRETTY_PRINT);
    }
}