<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-03-13
 * Time: 12:25
 */

namespace RetargetingSDK\Helpers;

use RetargetingSDK\Exceptions\RTGException;

/**
 * Class Encryption
 * @package Retargeting\Helpers
 */
class EncryptionHelper
{
    const METHOD = "AES-256-CBC";
    const HASH_ALGORITHM = 'sha512';

    public static $token;

    /**
     * EncryptionHelper constructor.
     * @param $token
     * @throws RTGException
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
        return hash(self::HASH_ALGORITHM, self::$token);
    }
}
