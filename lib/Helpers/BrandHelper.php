<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-18
 * Time: 11:57
 */

namespace Retargeting\Helpers;

class BrandHelper extends AbstractHelper implements Helper
{
    /**
     * Format brand object
     * @param mixed $brand
     * @return array|bool|\stdClass
     */
    public static function validate($brand)
    {
        if(is_bool($brand) && !$brand)
        {
            return false;
        }
        else
        {
            $brandArr = [];

            if(is_array($brand))
            {
                if(array_key_exists('id', $brand))
                {
                    $brandArr['id'] = $brand['id'];
                }

                if(array_key_exists('name', $brand))
                {
                    $brandArr['name'] = self::sanitize($brand['name'], 'string');
                }
            }

            return json_encode($brandArr, JSON_PRETTY_PRINT);
        }
    }
}