<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-15
 * Time: 10:50
 */

namespace Retargeting\Validations;


class UrlValidator extends AbstractValidator implements Validator
{
    const HTTPS_VALUE = ['https', 'http'];
    const URL_CHECK_ERROR = 'url_error_check';

    /**
     * @param mixed $url
     * @return array|bool|mixed
     */
    public static function validate($url)
    {
        if (!is_string($url)) {
            throw new \InvalidArgumentException("\$from must be an string.  Given value: '{$url}'");
        }

        $url = parse_url($url);

        if(in_array($url['scheme'], self::HTTPS_VALUE))
        {
            return true;
        } else {
            return self::getMessage(self::URL_CHECK_ERROR);
        }
    }
}