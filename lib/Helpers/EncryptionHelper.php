<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-03-13
 * Time: 12:25
 */

namespace Retargeting\Helpers;

/**
 * Class Encryption
 * @package Retargeting\Helpers
 */
class EncryptionHelper
{
    const METHOD = "AES-256-CBC";

    public static $token;

    /**
     * Encryption constructor.
     * @param $token
     */
    public function __construct($token)
    {
        self::$token    = $token;
    }

    /**
     * @param $data
     * @return string
     */
    public static function encrypt($data)
    {
        $ivSize = openssl_cipher_iv_length(self::METHOD);
        $iv = openssl_random_pseudo_bytes($ivSize);

        $encrypted = openssl_encrypt($data, self::METHOD, self::createKey(), OPENSSL_RAW_DATA, $iv);


        return rtrim(strtr(base64_encode($iv . $encrypted), '+/', '-_'), '=');
    }

    /**
     * @return string
     */
    private static function createKey()
    {
        return hash('sha512', self::$token);
    }

    /**
     * @param int $length
     * @param null $time
     * @return string
     */
    private function generateNonce($length = 12, $time = null)
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

}
