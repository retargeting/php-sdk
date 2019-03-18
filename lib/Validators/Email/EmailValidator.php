<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-18
 * Time: 14:43
 */

namespace Retargeting\Validators\Email;

use Retargeting\Validators\AbstractValidator;
use Retargeting\Validators\Validator;

class EmailValidator extends AbstractValidator implements Validator
{
    /**
     * Format email properly
     * @param mixed $email
     * @return array|mixed
     */
    public static function validate($email)
    {
        $email = self::sanitize($email, 'email');

        return $email;
    }
}