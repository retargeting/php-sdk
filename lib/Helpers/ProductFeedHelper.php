<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-18
 * Time: 17:56
 */

namespace Retargeting\Helpers;

final class ProductFeedHelper extends AbstractHelper implements Helper
{
    /**
     * Check if product feed json is valid or not
     * @param mixed $feed
     * @return array|mixed
     */
    public static function validate($feed)
    {
        $feed = json_encode($feed);

        $result = json_decode($feed);

        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                $error = '';
                break;
            case JSON_ERROR_DEPTH:
                $error = 'The maximum stack depth has been exceeded.';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                $error = 'Invalid or malformed JSON.';
                break;
            case JSON_ERROR_CTRL_CHAR:
                $error = 'Control character error, possibly incorrectly encoded.';
                break;
            case JSON_ERROR_SYNTAX:
                $error = 'Syntax error, malformed JSON.';
                break;
            case JSON_ERROR_UTF8:
                $error = 'Malformed UTF-8 characters, possibly incorrectly encoded.';
                break;
            case JSON_ERROR_RECURSION:
                $error = 'One or more recursive references in the value to be encoded.';
                break;
            case JSON_ERROR_INF_OR_NAN:
                $error = 'One or more NAN or INF values in the value to be encoded.';
                break;
            case JSON_ERROR_UNSUPPORTED_TYPE:
                $error = 'A value of a type that cannot be encoded was given.';
                break;
            default:
                $error = 'Unknown JSON error occured.';
                break;
        }

        if ($error !== '') {
            return [];
        }

        return $result;
    }

    /**
     * Formats price into format, e.g. 1000.99.
     *
     * @param int|float|string $price the price string to format.
     * @return string|null the formatted price.
     */
    public static function formatPrice($price)
    {
        return is_numeric($price) ? number_format($price, 2, '.', '') : null;
    }
}