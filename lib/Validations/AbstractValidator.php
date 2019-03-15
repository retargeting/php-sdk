<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-15
 * Time: 11:44
 */

namespace Retargeting\Validations;

class AbstractValidator
{
    const MESSAGES = [
        'url_error_check' => 'Url must be absolute and start with https:// or http://'
    ];

    /**
     * Get error message
     * @param $key
     * @return bool|mixed
     */
    public static function getMessage($key)
    {
        if(array_key_exists($key, self::MESSAGES))
        {
            return self::MESSAGES[$key];
        }

        return false;
    }
}