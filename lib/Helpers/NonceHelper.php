<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-03-13
 * Time: 12:52
 */

namespace Retargeting\Helpers;

/**
 * Class Nonce
 * @package Retargeting\Helpers
 */
class NonceHelper
{

    /**
     * @param int $length
     * @param null $time
     * @return string
     */
    public static function createNonce($length = 12, $time = null)
    {
        $time = ($time === null) ? time() : $time;

        $nonce = gmstrftime('%Y-%m-%dT%H:%M:%SZ', $time);
        if ($length < 1) {
            return $nonce;
        }

        $length = (int)$length;
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';

        $unique = '';
        for ($i = 0; $i < $length; $i++) {
            $unique .= substr($chars, (rand() % (strlen($chars))), 1);
        }

        return rtrim(strtr(base64_encode($nonce . $unique), '+/', '-_'), '=');
    }

    /**
     * @param $nonce
     * @param int $clockSkew
     * @return bool
     */
    public static function validate($nonce, $clockSkew = 60)
    {
        $nonce = base64_decode(
            str_pad(
                strtr($nonce, '-_', '+/'),
                strlen($nonce) % 4,
                '=',
                STR_PAD_RIGHT
            )
        );

        if (strlen($nonce) > 255) {
            return false;
        }

        $result = preg_match('/(\d{4})-(\d\d)-(\d\d)T(\d\d):(\d\d):(\d\d)Z(.*)/',
            $nonce,
            $matches);
        if ($result != 1 || count($matches) != 8) {
            return false;
        }

        $stamp = gmmktime($matches[4],
            $matches[5],
            $matches[6],
            $matches[2],
            $matches[3],
            $matches[1]);

        $time = time();
        if ($stamp < ($time - $clockSkew)
            || $stamp > ($time + $clockSkew)) {

            return false;
        }

        return true;
    }

}
