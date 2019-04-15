<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-03-13
 * Time: 12:25
 */

namespace RetargetingSDK\Helpers;

use RetargetingSDK\Exceptions\DecryptException;
use RetargetingSDK\Exceptions\RTGException;

/**
 * Class Decryption
 * @package Retargeting\Helpers
 */
class DecryptionHelper
{
    const METHOD = "AES-256-CBC";
    const HASH_ALGORITHM = 'sha512';

    private $hash;

    /**
     * DecryptionHelper constructor.
     * @param $token
     * @throws RTGException
     */
    public function __construct($token)
    {
        $this->hash = hash(self::HASH_ALGORITHM, $token);
    }

    /**
     * @param $token
     * @param $nonce
     * @return string
     * @throws DecryptException
     */
    public function decrypt($token, $nonce = null)
    {
        $data = $this->tokenDecrypt($token, $this->hash, self::METHOD);

        if ($nonce && !$this->verifyNonce($nonce)) {
            throw new DecryptException('Invalid Nonce!');
        }

        return $data;
    }

    /**
     * @param $data
     * @param $key
     * @param $method
     * @return bool|string
     */
    private function tokenDecrypt($data, $key, $method)
    {
        $data = base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
        $ivSize = openssl_cipher_iv_length($method);
        $iv = substr($data, 0, $ivSize);
        $data = openssl_decrypt(substr($data, $ivSize), $method, $key, OPENSSL_RAW_DATA, $iv);

        return $data;
    }

    /**
     * @param $nonce
     * @param int $clockSkew
     * @return bool
     */
    private function verifyNonce($nonce, $clockSkew = 60)
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

        $stamp = gmmktime(
            $matches[4],
            $matches[5],
            $matches[6],
            $matches[2],
            $matches[3],
            $matches[1]
        );

        $time = time();
        if ($stamp < ($time - $clockSkew)
            || $stamp > ($time + $clockSkew)) {

            return false;
        }

        return true;
    }

}
