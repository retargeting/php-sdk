<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-18
 * Time: 11:17
 */

namespace Retargeting\Validators;


class AbstractValidator
{
    /**
     * Sanitize a single var according to $type.
     * @param $var
     * @param $type
     * @return mixed
     */
    public static function sanitize($var, $type)
    {
        switch($type)
        {
            case 'url':
                $filter = FILTER_SANITIZE_URL;
                break;
            case 'int':
                $filter = FILTER_SANITIZE_NUMBER_INT;
                break;
            case 'float':
                $filter = FILTER_SANITIZE_NUMBER_FLOAT;
                break;
            case 'email':
                $var = substr($var, 0, 254);
                $filter = FILTER_SANITIZE_EMAIL;
                break;
            case 'string':
            default:
                $filter = FILTER_SANITIZE_STRING;
                break;

        }

        $result = filter_var($var, $filter);

        return $result;
    }
}