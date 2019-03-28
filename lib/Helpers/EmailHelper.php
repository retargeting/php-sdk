<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-18
 * Time: 14:43
 */

namespace Retargeting\Helpers;

final class EmailHelper extends AbstractHelper implements Helper
{
    /**
     * Validate email
     * @param $email
     * @return mixed
     * @throws \Exception
     */
    public static function validate($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            self::_throwException('invalidEmail');
        }

        $email = self::sanitize($email, 'email');

        return $email;
    }
}