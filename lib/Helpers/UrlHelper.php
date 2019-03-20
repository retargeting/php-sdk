<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-15
 * Time: 10:50
 */

namespace Retargeting\Helpers;

final class UrlHelper extends AbstractHelper implements Helper
{
    const HTTPS_HTTP_VALUE = ['https', 'http'];
    const HTTPS_VALUE = 'https://';

    /**
     * Check if url contains https/http
     * @param mixed $url
     * @return array|bool|mixed
     */
    public static function validate($url)
    {
        $url = (string)$url;

        $url = strip_tags(trim($url));

        $url = self::sanitize($url, 'url');

        $url = parse_url($url);

        if(isset($url['scheme']) && in_array($url['scheme'], self::HTTPS_HTTP_VALUE))
        {
            return $url;
        } else {
            return self::prepend(filter_input(INPUT_GET, 'link', FILTER_SANITIZE_URL), self::HTTPS_VALUE);
        }
    }

    /**
     * Prepend a string at the start of the initial string
     * @param $string
     * @param $prefix
     */
    public static function prepend(& $string, $prefix)
    {
        $string = substr_replace($string, $prefix, 0, 0);
    }
}