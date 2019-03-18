<?php
/**
 * Created by PhpStorm.
 * User: andreicotaga
 * Date: 2019-03-18
 * Time: 16:03
 */

namespace Retargeting\Validators\Variation;

use Retargeting\Validators\AbstractValidator;
use Retargeting\Validators\Validator;

class CodeValidator extends AbstractValidator implements Validator
{
    /**
     * Check if variation code has proper format
     * @param mixed $code
     * @return array|mixed|string
     */
    public static function validate($code)
    {
        $hyphen = substr_count($code, '-');

        if($hyphen >= 1)
        {
            $code = explode('-', $code);

            if(is_numeric($code[0]) && is_string($code[1]))
            {
                $code = implode('-', $code);
            }
            else
            {
                $code = '';
            }
        }

        return $code;
    }
}