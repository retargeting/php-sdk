<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-15
 * Time: 11:44
 */

namespace Retargeting\Helpers;


interface Helper
{
    /**
     * Returns an empty array
     * if $data is valid.
     *
     * @param mixed $data
     * @return array An array of error messages
     */
    public static function validate($data);
}